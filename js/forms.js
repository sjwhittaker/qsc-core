/****************************************************************************
 * Copyright (C) 2020, Sarah-Jane Whittaker (sarah@cs.queensu.ca)
 *
 * This program is free software: you can redistribute it and/or modify it 
 * under the terms of the GNU Affero General Public License as published by 
 * the Free Software Foundation, either version 3 of the License, or (at 
 * your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero 
 * General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License 
 * along with this program in the file gnu-agpl-3.0.txt. If not, 
 * see <https://www.gnu.org/licenses/>.
 * 
 * This program was developed with the input and support of the Queen's
 * University School of Computing <https://www.cs.queensu.ca/>, Faculty
 * of Arts and Science <https://www.queensu.ca/artsci/> and the Office of 
 * the Vice-Provost (Teaching and Learning) 
 * <https://www.queensu.ca/provost/teaching-and-learning>.
 ***************************************************************************/


/******************************************************************************
 * Select Form Controls
 *****************************************************************************/
function qscCoreUnselectAllOptions(selectID) {
    $(selectID + ' option:selected').prop('selected', false);
}

function qscCoreUnselectWithButton(unselectButtonID, selectID) {
    $(unselectButtonID).click(function(event) {
        qscCoreUnselectAllOptions(selectID);
    });     
}

function qscCoreUnselectOnChange(controlID, selectID) {
    $(controlID).change(function(event) {
        qscCoreUnselectAllOptions(selectID);
    });     
}


function qscCoreCreateOptionsFromJSONData(jsonData, valueProperty, textProperty, valueToIgnore = null) {
    let newOption = null;
    let newOptionArray = [];

    //let debug = "";

    // Create the new options based on the results
    for (let i = 0; i < jsonData.length; i++) {
        if (jsonData[i][valueProperty] === valueToIgnore) {
            continue;
        }

        newOption = document.createElement('option');
        newOption.value = jsonData[i][valueProperty];
        newOption.innerHTML = jsonData[i][textProperty];

        newOptionArray.push(newOption);

        //debug += jsonData[i][textProperty] + ", ";
    }

    //alert(debug);
    return newOptionArray;
}

function qscCoreTransferOption(sourceSelectID, destSelectID) {
    let selectionOption = $(sourceSelectID + ' option:selected');

    if (selectionOption.length) {
        $(destSelectID).append(selectionOption);

        // Sort the destination options that just had an element added
        let destOptions = $(destSelectID).find('option');
        destOptions.sort(function(first, second) {
            return $(first).text() > $(second).text() ? 1 : -1;
        });

        $(destSelectID).remove("option");
        $(destSelectID).append(destOptions);
    }
}

function qscCoreTransferOptionOnClick(buttonID, sourceSelectID, destSelectID) {
    $(buttonID).click(function(event) {
        qscCoreTransferOption(sourceSelectID, destSelectID);
    });    
}

function qscCoreSelectAllOptions(selectID) {
    $(selectID + ' option').prop('selected', true);
    /*
    $(selectID + ' option').each(function() {
       alert($(this).html() + ": " + $(this).prop('selected')); 
    });
    */
}

function qscCoreCoordinateSelectedItem(clickEvent, clickedSelectElement, 
    twinSelectElement) {
    // What was selected?
    let clickedOptionIndex = clickEvent.target.index;
        
    // What is currently selected?
    let selectedOptionIndex = $(clickedSelectElement + " option:selected").index();
        
    // Check whther something was selected or unselected
    $(twinSelectElement + ' option:selected').prop("selected", false);            
    if (selectedOptionIndex !== -1) {
        // Unselect all other items in the course list and select
        // just the clicked item
        $(clickedSelectElement + ' option:selected').prop("selected", false);            
        $(clickedSelectElement).prop('selectedIndex', clickedOptionIndex);
        $(twinSelectElement).prop('selectedIndex', clickedOptionIndex);
    }        
        
}


/******************************************************************************
 * Deletion
 *****************************************************************************/
function qscCoreConfirmDelete(elementName) {
    return confirm("Are you certain you want to delete this " + elementName + "?");
}


