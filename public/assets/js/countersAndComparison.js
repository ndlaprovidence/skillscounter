document.addEventListener('DOMContentLoaded', function() {

    // First Counter
    var divNoteCpt1 = document.querySelector('.first-note');  // Get the div wich contain the counter and needles
    var oldCpt1 = divNoteCpt1.dataset.oldNoteFirstCpt;  // Get the old note
    var newCpt1 = divNoteCpt1.dataset.newNoteFirstCpt;  // Get the new note

    var oldNeedleCpt1 = divNoteCpt1.children.item(1);  // Retrieve the oldNeedle item (img) contained in the the div with the class '.first-note'
    var newNeedleCpt1 = divNoteCpt1.children.item(2);  // Retrieve the newNeedle item (img) contained in the the div with the class '.first-note'
    
    if (oldCpt1 < 0) {
        oldNeedleCpt1.style.visibility = 'hidden';
    }
    else {
        oldNeedleCpt1.style.transform = `rotateZ(${oldCpt1*9}deg)`;  // Needles rotation
    }

    if (newCpt1 < 0) {
        newNeedleCpt1.style.visibility = 'hidden';
    }
    else {
        newNeedleCpt1.style.transform = `rotateZ(${newCpt1*9}deg)`;
    }
    // ------------
    
    // Second Counter
    var divNoteCpt2 = document.querySelector('.second-note');  
    var oldCpt2= divNoteCpt2.dataset.oldNoteSecondCpt; 
    var newCpt2 = divNoteCpt2.dataset.newNoteSecondCpt; 

    var oldNeedleCpt2 = divNoteCpt2.children.item(1);  
    var newNeedleCpt2 = divNoteCpt2.children.item(2); 
    
    if (oldCpt2 < 0) {
        oldNeedleCpt2.style.visibility = 'hidden';
    }
    else {
        oldNeedleCpt2.style.transform = `rotateZ(${oldCpt2*9}deg)`;  // Needles rotation
    }

    if (newCpt2 < 0) {
        newNeedleCpt2.style.visibility = 'hidden';
    }
    else {
        newNeedleCpt2.style.transform = `rotateZ(${newCpt2*9}deg)`;
    }
    // ------------
    
    // Third Counter
    var divNoteCpt3 = document.querySelector('.third-note');  
    var oldCpt3= divNoteCpt3.dataset.oldNoteThirdCpt;  
    var newCpt3 = divNoteCpt3.dataset.newNoteThirdCpt;  

    var oldNeedleCpt3 = divNoteCpt3.children.item(1); 
    var newNeedleCpt3 = divNoteCpt3.children.item(2); 
    
    if (oldCpt3 < 0) {
        oldNeedleCpt3.style.visibility = 'hidden';
    }
    else {
        oldNeedleCpt3.style.transform = `rotateZ(${oldCpt3*9}deg)`;  // Needles rotation
    }

    if (newCpt3 < 0) {
        newNeedleCpt3.style.visibility = 'hidden';
    }
    else {
        newNeedleCpt3.style.transform = `rotateZ(${newCpt3*9}deg)`;
    }
    // ------------

    // Last Counter
    var divNoteCpt4 = document.querySelector('.last-note');
    var oldCpt4= divNoteCpt4.dataset.oldNoteLastCpt;  
    var newCpt4 = divNoteCpt4.dataset.newNoteLastCpt;  

    var oldNeedleCpt4 = divNoteCpt4.children.item(1);  
    var newNeedleCpt4 = divNoteCpt4.children.item(2);   

    if (oldCpt4 < 0) {
        oldNeedleCpt4.style.visibility = 'hidden';
    }
    else {
        oldNeedleCpt4.style.transform = `rotateZ(${oldCpt4*9}deg)`;  // Needles rotation
    }

    if (newCpt4 < 0) {
        newNeedleCpt4.style.visibility = 'hidden';
    }
    else {
        newNeedleCpt4.style.transform = `rotateZ(${newCpt4*9}deg)`;
    }
    // ------------

    // New note average score
    var newAverageNote = 0;
    var cptNotesValides = 0;
    var tabNewNote = [newCpt1, newCpt2, newCpt3, newCpt4];
    for (i = 0; i < tabNewNote.length; i++ ) {
        if(tabNewNote[i] >= 0) {
            newAverageNote += parseFloat(tabNewNote[i]);
            cptNotesValides++;
        }
    }
    newAverageNote = newAverageNote / cptNotesValides;

    if ((newAverageNote % cptNotesValides) < 0.5) {
        newAverageNote = Math.floor(newAverageNote);
    }
    else if ((newAverageNote % cptNotesValides) > 0.5) {
        newAverageNote = Math.ceil(newAverageNote);
    }
    
    var newNoteTextArea = document.querySelector('.new-note-comparison-text');
    newNoteTextArea.textContent = newAverageNote + "/20";

    if (newAverageNote >= 0) {
        newNoteTextArea.textContent = newAverageNote + "/20";
    }
    else {
        // newNoteTextArea.textContent = "Notes values undefined";
        newNoteTextArea.textContent = "Valeurs des notes indéfinies";
    }
    
    // ------------

    cptNotesValides = 0;
    
    // Old note average score
    var oldAverageNote = 0;
    var tabOldNote = [oldCpt1, oldCpt2, oldCpt3, oldCpt4];
    for (i = 0; i < tabOldNote.length; i++ ) 
    {
        if(tabOldNote[i] >= 0) {
            oldAverageNote += parseFloat(tabOldNote[i]);
            cptNotesValides++;
        }
    }
    
    oldAverageNote = oldAverageNote / cptNotesValides;

    if ((oldAverageNote % 4) < 0.5) 
    {
        oldAverageNote = Math.floor(oldAverageNote);
    }
    else if ((oldAverageNote % 4) > 0.5) 
    {
        oldAverageNote = Math.ceil(oldAverageNote);
    }
    
    console.log(cptNotesValides);

    var oldNoteTextArea = document.querySelector('.old-note-comparison-text');
    if (oldAverageNote >= 0) {
        oldNoteTextArea.textContent = oldAverageNote + "/20";
    }
    else {
        // oldNoteTextArea.textContent = "no previous note";
        oldNoteTextArea.textContent = "aucune note antérieure";
    }
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