<?php
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


/****************************************************************************
 * Constants
 ***************************************************************************/
qsc_core_define_constant("QSC_CORE_FORM_LABEL_TEXT", "QSC_CORE_FORM_LABEL_TEXT");

qsc_core_define_constant("QSC_CORE_FORM_HELP_ID", "QSC_CORE_FORM_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_HELP_TEXT", "QSC_CORE_FORM_HELP_TEXT");

qsc_core_define_constant("QSC_CORE_FORM_INPUT_HELP_ID", "QSC_CORE_FORM_INPUT_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_INPUT_HELP_TEXT", "QSC_CORE_FORM_INPUT_HELP_TEXT");
qsc_core_define_constant("QSC_CORE_FORM_INPUT_MAX_LENGTH", "QSC_CORE_FORM_INPUT_MAX_LENGTH");
qsc_core_define_constant("QSC_CORE_FORM_INPUT_VALUE", "QSC_CORE_FORM_INPUT_VALUE");

qsc_core_define_constant("QSC_CORE_FORM_SELECT_HELP_ID", "QSC_CORE_FORM_SELECT_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_HELP_TEXT", "QSC_CORE_FORM_SELECT_HELP_TEXT");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_UNSELECT_ID", "QSC_CORE_FORM_SELECT_UNSELECT_ID");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_UNSELECT_BUTTON_TEXT", "QSC_CORE_FORM_SELECT_UNSELECT_BUTTON_TEXT");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_SIZE", "QSC_CORE_FORM_SELECT_SIZE");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_MULTIPLE", "QSC_CORE_FORM_SELECT_MULTIPLE");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_OPTIONS", "QSC_CORE_FORM_SELECT_OPTIONS");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_SELECTED_VALUE", "QSC_CORE_FORM_SELECT_SELECTED_VALUE");
qsc_core_define_constant("QSC_CORE_FORM_SELECT_SELECTED_TEXT", "QSC_CORE_FORM_SELECT_SELECTED_TEXT");

qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_POSSIBLE_OPTIONS", "QSC_CORE_FORM_TRANSFER_POSSIBLE_OPTIONS");
qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_ID", "QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_TEXT", "QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_TEXT");
qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_CHOSEN_OPTIONS", "QSC_CORE_FORM_TRANSFER_CHOSEN_OPTIONS");
qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_ID", "QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_TEXT", "QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_TEXT");

qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_HELP_ID", "QSC_CORE_FORM_TEXTAREA_HELP_ID");
qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_HELP_TEXT", "QSC_CORE_FORM_TEXTAREA_HELP_TEXT");
qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_ROWS", "QSC_CORE_FORM_TEXTAREA_ROWS");
qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_COLS", "QSC_CORE_FORM_TEXTAREA_COLS");
qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_MAX_LENGTH", "QSC_CORE_FORM_TEXTAREA_MAX_LENGTH");
qsc_core_define_constant("QSC_CORE_FORM_TEXTAREA_VALUE", "QSC_CORE_FORM_TEXTAREA_VALUE");

qsc_core_define_constant("QSC_CORE_FORM_MORE_HTML_START", "QSC_CORE_FORM_MORE_HTML_START");
qsc_core_define_constant("QSC_CORE_FORM_MORE_HTML_END", "QSC_CORE_FORM_MORE_HTML_END");

qsc_core_define_constant("QSC_CORE_FORM_REQUIRED", "QSC_CORE_FORM_REQUIRED");
qsc_core_define_constant("QSC_CORE_FORM_CHECKED", "QSC_CORE_FORM_CHECKED");
qsc_core_define_constant("QSC_CORE_FORM_SIDE_BY_SIDE", "QSC_CORE_FORM_SIDE_BY_SIDE");

qsc_core_define_constant("QSC_CORE_FORM_HIDDEN_CONTROLS", "QSC_CORE_FORM_HIDDEN_CONTROLS");
qsc_core_define_constant("QSC_CORE_FORM_SUBMIT_BUTTON_TEXT", "QSC_CORE_FORM_HIDDEN_CONTROLS");
qsc_core_define_constant("QSC_CORE_FORM_FORM_ID", "QSC_CORE_FORM_FORM_ID");
qsc_core_define_constant("QSC_CORE_FORM_FORM_METHOD", "QSC_CORE_FORM_FORM_METHOD");


/****************************************************************************
 * Functions
 ***************************************************************************/
/**
 * 
 * @param type $label_text
 * @param type $select_possible_id
 * @param type $select_chosen_id
 * @param type $button_add_id
 * @param type $button_remove_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_input_and_select_transfer_group($label_text, $input_id, $select_possible_id, $select_chosen_id, $button_add_id, $button_remove_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");

    $input_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_ID, "");
    $input_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_TEXT, "");
    $input_max_length = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_MAX_LENGTH, 0);
    
    $select_possible_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_ID, "");
    $select_possible_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_TEXT, "");

    $select_chosen_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_ID, "");
    $select_chosen_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_TEXT, "");

    $select_possible_options = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_OPTIONS, array());
    $select_chosen_options = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_OPTIONS, array());
    
    $select_size = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SIZE, 6);
    $select_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_ID, "");
    $select_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_TEXT, "");
    
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");
        
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;        
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($select_possible_id, $label_text, $required); ?> 
    <div class="form-row input-and-select-transfer-input">
        <div class="col-12">
            <input type="text" class="form-control" id="<?= $input_id; ?>" name="<?= $input_id; ?>"<?php qsc_core_echo_if_truthy(array($input_max_length => "maxLength=\"$input_max_length\"", $input_help_id => "aria-describedby=\"$input_help_id\"")); ?>/>
            <?php qsc_core_form_display_help_text($input_help_id, $input_help_text); ?>
        </div>
    </div>
    <div class="form-row input-and-select-transfer-select">               
        <div class="col-lg">
            <select class="form-control" id="<?= $select_possible_id; ?>" name="<?= $select_possible_id; ?>" multiple<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_possible_help_id => "aria-describedby=\"$select_possible_help_id\"")); ?>>
            <?php foreach ($select_possible_options as $value => $text) : ?>
                <option value="<?= $value; ?>"><?= $text; ?></option>
            <?php endforeach; ?>
            </select>
            <?php qsc_core_form_display_help_text($select_possible_id, $select_possible_help_text); ?>
        </div>
        <div class="col-lg-auto transfer-button-column">
            <input type="button" id="<?= $button_add_id; ?>" name="<?= $button_add_id; ?>" value="&raquo;">
            <br/>
            <input type="button" id="<?= $button_remove_id; ?>" name="<?= $button_remove_id; ?>" value="&laquo;">
        </div>
        <div class="col-lg">
            <select class="form-control" id="<?= $select_chosen_id; ?>" name="<?= $select_chosen_id; ?>[]" multiple<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_chosen_help_id => "aria-describedby=\"$select_chosen_help_id\"", $required => "required")); ?>>
            <?php foreach ($select_chosen_options as $value => $text) : ?>
                <option value="<?= $value; ?>"><?= $text; ?></option>
            <?php endforeach; ?>
            </select>
            <?php qsc_core_form_display_help_text($select_chosen_help_id, $select_chosen_help_text); ?>
        </div>
        <div class="col-12 input-and-select-transfer-help">
            <?php qsc_core_form_display_help_text($select_help_id, $select_help_text, $required); ?>               
        </div>        
    </div>
    <?= $more_html_end; ?>        
<?php
}


/**
 * 
 * @param type $label_text
 * @param type $select_possible_id
 * @param type $select_chosen_id
 * @param type $button_add_id
 * @param type $button_remove_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_select_transfer_group($label_text, $select_possible_id, $select_chosen_id, $button_add_id, $button_remove_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");
    
    $select_possible_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_ID, "");
    $select_possible_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_HELP_TEXT, "");

    $select_chosen_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_ID, "");
    $select_chosen_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_HELP_TEXT, "");

    $select_possible_options = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_POSSIBLE_OPTIONS, array());
    $select_chosen_options = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TRANSFER_CHOSEN_OPTIONS, array());
    
    $select_size = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SIZE, 6);
    
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($select_possible_id, $label_text); ?>    
    <div class="form-row">
        <div class="col-lg">
            <select class="form-control" id="<?= $select_possible_id; ?>" name="<?= $select_possible_id; ?>" multiple<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_possible_help_id => "aria-describedby=\"$select_possible_help_id\"")); ?>>
            <?php foreach ($select_possible_options as $value => $text) : ?>
                <option value="<?= $value; ?>"><?= $text; ?></option>
            <?php endforeach; ?>
            </select>
            <?php qsc_core_form_display_help_text($select_possible_id, $select_possible_help_text); ?>
        </div>
        <div class="col-lg-auto transfer-button-column">
            <input type="button" id="<?= $button_add_id; ?>" name="<?= $button_add_id; ?>" value="&raquo;">
            <br/>
            <input type="button" id="<?= $button_remove_id; ?>" name="<?= $button_remove_id; ?>" value="&laquo;">
        </div>
        <div class="col-lg">
            <select class="form-control" id="<?= $select_chosen_id; ?>" name="<?= $select_chosen_id; ?>[]" multiple<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_chosen_help_id => "aria-describedby=\"$select_chosen_help_id\"")); ?>>
            <?php foreach ($select_chosen_options as $value => $text) : ?>
                <option value="<?= $value; ?>"><?= $text; ?></option>
            <?php endforeach; ?>
            </select>
            <?php qsc_core_form_display_help_text($select_chosen_help_id, $select_chosen_help_text); ?>
        </div>
    </div>
    <?= $more_html_end; ?>        
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $textarea_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_textarea($label_text, $textarea_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");

    $textarea_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_HELP_ID, "");
    $textarea_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_HELP_TEXT, "");
    $textarea_rows = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_ROWS, 5);
    $textarea_cols = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_COLS, 0);
    $textarea_max_length = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_MAX_LENGTH, 0);
    $textarea_value = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_TEXTAREA_VALUE, "");
    
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;    
    
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");            
    
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($textarea_id, $label_text, $required); ?>    
    <textarea class="form-control" id="<?php echo $textarea_id; ?>" name="<?php echo $textarea_id; ?>"<?php qsc_core_echo_if_truthy(array($textarea_rows => "rows=\"$textarea_rows\"", $textarea_cols => "cols=\"$textarea_cols\"", $textarea_max_length => "maxLength=\"$textarea_max_length\"", $textarea_help_id => "aria-describedby=\"$textarea_help_id\"", $required => "required")); ?>><?php echo $textarea_value; ?></textarea>
    <?php qsc_core_form_display_help_text($textarea_help_id, $textarea_help_text, $required); ?>
    <?= $more_html_end; ?>        
    <?php
}

/**
 * 
 * @param type $form_action
 * @param type $submit_button_text
 * @param type $optional_arguments
 */
function qsc_core_form_display_single_button_form($form_action, $submit_button_text, $optional_arguments = array()) {
    $form_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_FORM_ID, "");
    $form_method = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_FORM_METHOD, 'POST');
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");    
    $hidden_controls = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_HIDDEN_CONTROLS, array());    
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");    
?>
    <form <?= qsc_core_echo_if_truthy(array($form_id => "id=\"$form_id\"")); ?> action="<?= $form_action; ?>" method="<?= $form_method; ?>">
        <?= $more_html_start; ?>        
    <?php foreach ($hidden_controls as $id => $value) : ?>
        <input type="hidden" name="<?= $id;?>" id="<?= $id;?>" value="<?= $value; ?>"/>
    <?php endforeach; ?>
        <input type="submit" value="<?= $submit_button_text; ?>">
        <?= $more_html_end; ?>
    </form>
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $select_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_select($label_text, $select_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");
    
    $select_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_ID, "");
    $select_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_TEXT, "");

    $select_unselect_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_UNSELECT_ID, "");
    $select_unselect_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_UNSELECT_BUTTON_TEXT, "Unselect");
    
    $select_size = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SIZE, 0);
    $select_selected_value = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SELECTED_VALUE, "");
    $select_options = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_OPTIONS, array());
    
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;        
    $multiple = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_MULTIPLE, false) ?
        'multiple' : false;    

    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");      
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($select_id, $label_text, $required); ?>    
    <?php if ($select_unselect_id) : ?>
    <div class="form-row">
        <div class="col-xl-8 col-lg-10">
    <?php endif; ?>
            <select class="form-control" id="<?= $select_id; ?>" name="<?= $select_id; ?><?= ($multiple) ? "[]" : ""; ?>"<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_help_id => "aria-describedby=\"$select_help_id\"", $multiple => "multiple", $required => "required")); ?>>
            <?php foreach ($select_options as $value => $text) : ?>
                <option value="<?= $value; ?>"<?php if ($value == $select_selected_value) : ?> selected<?php endif; ?>><?= $text; ?></option>
            <?php endforeach; ?>
            </select>
    <?php if ($select_unselect_id) : ?>
        </div>
        <div class="col-xl-4 col-lg-2">
            <input type="button" id="<?= $select_unselect_id; ?>" name="<?= $select_unselect_id; ?>" value="<?= $select_unselect_text ?>"/>
        </div>        
        <div class="col-12">
    <?php endif; ?>
        <?php qsc_core_form_display_help_text($select_help_id, $select_help_text, $required); ?>
    <?php if ($select_unselect_id) : ?>
        </div>
    </div>
    <?php endif; ?>
    <?= $more_html_end; ?>        
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $input_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_input_text($label_text, $input_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");

    $input_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_ID, "");
    $input_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_TEXT, "");
    $input_max_length = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_MAX_LENGTH, 0);
    $input_value = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_VALUE, 0);
    
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;

    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");            
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($input_id, $label_text, $required); ?>    
    <input type="text" class="form-control" id="<?= $input_id; ?>" name="<?= $input_id; ?>"<?php qsc_core_echo_if_truthy(array($input_value => "value=\"$input_value\"", $input_max_length => "maxLength=\"$input_max_length\"", $input_help_id => "aria-describedby=\"$input_help_id\"", $required => "required")); ?>/>
    <?php qsc_core_form_display_help_text($input_help_id, $input_help_text, $required); ?>
    <?= $more_html_end; ?>        
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $input_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_input_date($label_text, $input_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");

    $input_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_ID, "");
    $input_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_TEXT, "");
    $input_max_length = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_MAX_LENGTH, 0);
    $input_value = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_VALUE, 0);
    
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;

    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");        
?>
    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($input_id, $label_text, $required); ?>    
    <input type="text" class="form-control" id="<?= $input_id; ?>" name="<?= $input_id; ?>" placeholder="YYYY-MM-DD" title="format : y-MM-dd"<?php qsc_core_echo_if_truthy(array($input_value => "value=\"$input_value\"", $input_max_length => "maxLength=\"$input_max_length\"", $input_help_id => "aria-describedby=\"$input_help_id\"", $required => "required")); ?>/>
    <?php qsc_core_form_display_help_text($input_help_id, $input_help_text, $required); ?>
    <?= $more_html_end; ?>        
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $input_id
 * @param type $select_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_input_and_select_group($label_text, $input_id, $select_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");
    
    $input_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_ID, "");
    $input_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_HELP_TEXT, "");
    $input_max_length = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_INPUT_MAX_LENGTH, 0);

    $select_help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_ID, "");
    $select_help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_HELP_TEXT, "");
    $select_size = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SIZE, 6);
    $select_selected_value = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SELECTED_VALUE, "");
    $select_selected_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_SELECTED_TEXT, "");
    
    $multiple = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SELECT_MULTIPLE, false) ?
        'multiple' : false;
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;    
    $side_by_side = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_SIDE_BY_SIDE, true) ?
        'side_by_side' : false;
        
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");    
    ?>

    <?= $more_html_start; ?>
    <?php qsc_core_form_display_label($input_id, $label_text, $required); ?>    
    <div class="form-row">
        <?php if ($side_by_side) : ?>
        <div class="col-lg-5">
        <?php endif; ?>
            <input type="text" class="form-control" id="<?= $input_id; ?>" name="<?= $input_id; ?>"<?php qsc_core_echo_if_truthy(array($input_max_length => "maxLength=\"$input_max_length\"", $input_help_id => "aria-describedby=\"$input_help_id\"")); ?>/>
            <?php qsc_core_form_display_help_text($input_help_id, $input_help_text); ?>
        <?php if ($side_by_side) : ?>
        </div>
        <div class="col-lg-7">
        <?php endif; ?>
            <select class="form-control" id="<?= $select_id; ?>" name="<?= $select_id; ?><?= ($multiple) ? "[]" : ""; ?>"<?php qsc_core_echo_if_truthy(array($select_size => "size=\"$select_size\"", $select_help_id => "aria-describedby=\"$select_help_id\"", $required => "required", $multiple => "multiple")); ?>>
        <?php if ($select_selected_value) : ?>
                <option value="<?= $select_selected_value; ?>" selected><?= $select_selected_text; ?></option>
        <?php endif; ?>
            </select>
            <?php qsc_core_form_display_help_text($select_help_id, $select_help_text, $required); ?>
        <?php if ($side_by_side) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?= $more_html_end; ?>
<?php
}

/**
 * 
 * @param type $help_id
 * @param type $help_text
 * @param type $required
 * @return type
 */
function qsc_core_form_display_help_text($help_id, $help_text, $required = false) {
    if (empty($help_id) || empty($help_text)) {
        return;
    }
?>
    <div id="<?= $help_id; ?>" class="qsc-core-form-help-text"><?php if ($required) : ?><span class="required"><?= ($required) ? '<i class="fas fa-star fa-required" aria-hidden="true"></i>' : ""; ?>Required:</span> <?php endif; ?><?= $help_text; ?></div>
<?php
}

/**
 * 
 * @param type $control_id
 * @param type $label_text
 * @param type $required
 */
function qsc_core_form_display_label($control_id, $label_text, $required = false) {
?>
    <label for="<?= $control_id; ?>"><?= ($required) ? '<i class="fas fa-star fa-required" aria-hidden="true"></i>' : ""; ?><?= $label_text; ?></label>
<?php
}

/**
 * 
 * @param type $label_text
 * @param type $checkbox_id
 * @param type $optional_arguments
 */
function qsc_core_form_display_checkbox($label_text, $checkbox_id, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");

    $help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_HELP_ID, "");
    $help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_HELP_TEXT, "");
    
    $checked = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_CHECKED, false) ?
        'checked' : false;    
    $required = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_REQUIRED, false) ?
        'required' : false;    
    
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");
?>
    <?= $more_html_start; ?>
    <input type="checkbox" class="qsc-core-form-check-input" id="<?= $checkbox_id; ?>" name="<?= $checkbox_id; ?>"<?php qsc_core_echo_if_truthy(array($checked => "checked", $help_id => "aria-describedby=\"$help_id\"", $required => "required")); ?>>
    <?php qsc_core_form_display_label($checkbox_id, $label_text, $required); ?>
    <?php qsc_core_form_display_help_text($help_id, $help_text, $required); ?>
    <?= $more_html_end; ?>        
    <?php
}

/**
 * 
 * @param type $label_text
 * @param type $input_id
 * @param type $input_value
 * @param type $optional_arguments
 */
function qsc_core_form_display_disabled_text($label_text, $input_id, $input_value, $optional_arguments = array()) {
    $more_html_start = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_START, "");
    $help_id = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_HELP_ID, "");
    $help_text = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_HELP_TEXT, "");
    $more_html_end = qsc_core_get_array_value($optional_arguments, QSC_CORE_FORM_MORE_HTML_END, "");
?>
    <?= $more_html_start; ?>
    <label for="<?= $input_id; ?>"><?= $label_text; ?></label>
    <input type="text" class="form-control" id="<?= $input_id; ?>" name="<?= $input_id; ?>" value="<?= $input_value; ?>" disabled/>
    <?php qsc_core_form_display_help_text($help_id, $help_text); ?>
    <?= $more_html_end; ?>        
<?php
}


