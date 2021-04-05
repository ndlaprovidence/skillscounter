document.addEventListener('DOMContentLoaded', function() {

    // First Counter
    var divNoteCpt1 = document.querySelector('.first-note');  // Get the div wich contain the counter and needles
    var oldCpt1 = divNoteCpt1.dataset.oldNoteFirstCpt;  // Get the old note
    var newCpt1 = divNoteCpt1.dataset.newNoteFirstCpt;  // Get the new note

    var oldNeedleCpt1 = divNoteCpt1.children.item(1);  // Retrieve the oldNeedle item (img) contained in the the div with the class '.first-note'
    var newNeedleCpt1 = divNoteCpt1.children.item(2);  // Retrieve the newNeedle item (img) contained in the the div with the class '.first-note'
    
    oldNeedleCpt1.style.transform = `rotateZ(${oldCpt1*9}deg)`;  // Needles rotation
    newNeedleCpt1.style.transform = `rotateZ(${newCpt1*9}deg)`;
    // ------------
    
    // Second Counter
    var divNoteCpt2 = document.querySelector('.second-note');  
    var oldCpt2= divNoteCpt2.dataset.oldNoteSecondCpt; 
    var newCpt2 = divNoteCpt2.dataset.newNoteSecondCpt; 

    var oldNeedleCpt2 = divNoteCpt2.children.item(1);  
    var newNeedleCpt2 = divNoteCpt2.children.item(2);  
    
    oldNeedleCpt2.style.transform = `rotateZ(${oldCpt2*9}deg)`;  
    newNeedleCpt2.style.transform = `rotateZ(${newCpt2*9}deg)`;
    // ------------
    
    // Third Counter
    var divNoteCpt3 = document.querySelector('.third-note');  
    var oldCpt3= divNoteCpt3.dataset.oldNoteThirdCpt;  
    var newCpt3 = divNoteCpt3.dataset.newNoteThirdCpt;  

    var oldNeedleCpt3 = divNoteCpt3.children.item(1); 
    var newNeedleCpt3 = divNoteCpt3.children.item(2); 
    
    oldNeedleCpt3.style.transform = `rotateZ(${oldCpt3*9}deg)`; 
    newNeedleCpt3.style.transform = `rotateZ(${newCpt3*9}deg)`;
    // ------------

    // Last Counter
    var divNoteCpt4 = document.querySelector('.last-note');
    var oldCpt4= divNoteCpt4.dataset.oldNoteLastCpt;  
    var newCpt4 = divNoteCpt4.dataset.newNoteLastCpt;  

    var oldNeedleCpt4 = divNoteCpt4.children.item(1);  
    var newNeedleCpt4 = divNoteCpt4.children.item(2);   
    oldNeedleCpt4.style.transform = `rotateZ(${oldCpt4*9}deg)`; 
    newNeedleCpt4.style.transform = `rotateZ(${newCpt4*9}deg)`;
    // ------------

    // New note average score
    var newAverageNote = 0;
    var tabNewNote = [newCpt1, newCpt2, newCpt3, newCpt4];
    for (i = 0; i < tabNewNote.length; i++ ) {
        newAverageNote += parseFloat(tabNewNote[i]);
    }
    newAverageNote = newAverageNote / 4;

    if ((newAverageNote % 4) < 0.5) {
        newAverageNote = Math.floor(newAverageNote);
    }
    else if ((newAverageNote % 4) > 0.5) {
        newAverageNote = Math.ceil(newAverageNote);
    }
    
    var newNoteTextArea = document.querySelector('.new-note-comparison-text');
    newNoteTextArea.textContent = newAverageNote + "/20";
    // ------------

    // Old note average score
    var oldAverageNote = 0;
    var tabOldNote = [oldCpt1, oldCpt2, oldCpt3, oldCpt4];
    for (i = 0; i < tabOldNote.length; i++ ) {
        oldAverageNote += parseFloat(tabOldNote[i]);
    }
    oldAverageNote = oldAverageNote / 4;

    if ((oldAverageNote % 4) < 0.5) {
        oldAverageNote = Math.floor(oldAverageNote);
    }
    else if ((oldAverageNote % 4) > 0.5) {
        oldAverageNote = Math.ceil(oldAverageNote);
    }
    
    var oldNoteTextArea = document.querySelector('.old-note-comparison-text');
    oldNoteTextArea.textContent = oldAverageNote + "/20";
    // ------------

    // Comparison arrow orientation
    var arrowComparison = document.querySelector('.arrow-comparison');
    if ((newAverageNote - oldAverageNote) < 0) {
        arrowComparison.style.transform = 'rotateZ(90deg)';
        arrowComparison.style.filter = 'hue-rotate(260deg) contrast(260%) brightness(47%) saturate(125%)';
    }
    else if ((newAverageNote - oldAverageNote) == 0) {
        arrowComparison.style.transform = 'rotateZ(45deg)';
        arrowComparison.style.filter = 'hue-rotate(260deg) ';
    }
});