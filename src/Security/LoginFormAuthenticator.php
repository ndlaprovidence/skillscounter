<?php

namespace App\Security;

use App\Entity\User;
use App\Entity\Teacher;
use App\Entity\Student;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
//use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;


class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private $entityManager;
    private $urlGenerator;
    private $csrfTokenManager;
    private $passwordEncoder;
    private $client;
    private $logger;

    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder, HttpClientInterface $client )
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->client = $client ;
    }

    public function supports(Request $request)
    {
        return self::LOGIN_ROUTE === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        
        $username = $credentials['username'];
        dump($username);
        $password = $credentials['password'];
        dump($password);  

        $response = $this->client->request(
            'POST',
            'https://api.ecoledirecte.com/v3/login.awp',
            [
                'body' => 'data= {
                    "identifiant": "' . $username . '" ,
                    "motdepasse": "' . urlencode($password) .  '" 
                    
      
                }',
            ]
        );
         
        $ecoleDirecteResponse = json_decode($response->getContent());
        $ecoleDirecteCode = $ecoleDirecteResponse->code;
        $ecoleDirecteMessage = $ecoleDirecteResponse->message;
        
        $ecoleDirectedata = $ecoleDirecteResponse->data->accounts[0]->typeCompte;

        dump($ecoleDirectedata);


        $em = $this->entityManager;      
        $user= $em->getRepository(User::class)->findOneBy(['username' => $credentials['username']]);
        
/*
        if (!$studient) {
            $studient = new studient();
            $studient->SetUsername($username);
            $studient->SetPassword($this->passwordEncoder->encodePassword($studient, $password));
            $em->persist($studient);
            $em->flush();
            
        }elseif (!teacher) {
            $teacher = new User();
            $teacher->SetUsername($username);
            $teacher->SetPassword($this->passwordEncoder->encodePassword($teacher, $password));
            $em->persist($teacher);
            $em->flush();

        })

        return $user;

        */

        if (!$user) {
            // fail authentication with a custom error
            // throw new CustomUserMessageAuthenticationException('Username could not be found.');

            // Save new user in database
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $this->entityManager->persist($user);
           $this->entityManager->flush();
        }

        return $user;

        
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        
        $username = $credentials['username'];
        $password = $credentials['password'];
        
        
        $response = $this->client->request(
            'POST',
            'https://api.ecoledirecte.com/v3/login.awp',
            [
                'body' => 'data= {
                    "identifiant": "' . $username . '" ,
                    "motdepasse": "' . urlencode($password) .  '" 
      
                }',
            ]
        );
        
        $ecoleDirecteResponse = json_decode($response->getContent());
        
        $ecoleDirecteCode = $ecoleDirecteResponse->code;
        
        $ecoleDirecteMessage = $ecoleDirecteResponse->message;
        
        $this->logger->error($ecoleDirecteMessage);
        switch ($ecoleDirecteCode) {
            case 200:
                // authentication success                
                return true;
                break;
            case 505:
                // not valid username              
                if ($user) {
                    // delete user from database
                    $em = $this->entityManager;
                    $em->remove($user);
                    $em->flush();
                }

                throw new CustomUserMessageAuthenticationException($ecoleDirecteMessage);
                break;

                default:
                // fail authentication with a custom error
                    throw new CustomUserMessageAuthenticationException($ecoleDirecteMessage);
                    break;
        }
       
    }


    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }
        return new RedirectResponse($this->urlGenerator->generate('home'));
        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
