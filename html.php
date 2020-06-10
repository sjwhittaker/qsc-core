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


/**
 * Displays (in HTML) a message of some type.
 *
 * @param $message      The string message to log and display
 * @param $type         The string type/class of message
 */
function qsc_core_display_message($message, $type) {
    ?>
    <div class="message <?= $type; ?>">
        <?php
        echo $message;
        if ($type != QSC_CORE_MESSAGE_TYPE_SUCCESS) :
            ?>
            <hr/>
            Please contact the developer and/or systems staff for assistance and include the message above.
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Logs (in the PHP error log and SessionManager) an issue of some type.
 *
 * @param $prefix       The string prefix for the message to distinguish it in
 *                      the PHP error log
 * @param $message      The string message to log and display
 */
function qsc_core_log_issue($prefix, $message) {
    error_log($prefix . $message);
}


/**
 * Logs (in the PHP error log) and displays (in HTML) an error message.
 *
 * @param $message      The string error to log and display
 */
function qsc_core_log_and_display_error($message) {
    qsc_core_display_message($message, QSC_CORE_MESSAGE_TYPE_ERROR);
    qsc_core_log_issue(QSC_CORE_LOG_PREFIX_ERROR, $message);
}

/**
 * Logs (in the PHP error log) and displays (in HTML) a warning message.
 *
 * @param $message      The string warning to log and display
 */
function qsc_core_log_and_display_warning($message) {
    qsc_core_display_message($message, QSC_CORE_MESSAGE_TYPE_WARNING);
    qsc_core_log_issue(QSC_CORE_LOG_PREFIX_WARNING, $message);
}

/**
 * Displays (in HTML) a success message.
 *
 * @param $message      The successful string to display
 */
function qsc_core_display_success_message($message) {
    qsc_core_display_message($message, QSC_CORE_MESSAGE_TYPE_SUCCESS);
}

/**
 * 
 */
function qsc_core_echo_stylesheets_in_head() {
?>
        <link rel="stylesheet" href="<?= QSC_CORE_CSS_DIRECTORY_LINK; ?>/bootstrap.min.css">
        <link rel="stylesheet" href="<?= QSC_CORE_CSS_DIRECTORY_LINK; ?>/fontawesome.css">
        <link rel="stylesheet" href="<?= QSC_CORE_CSS_DIRECTORY_LINK; ?>/solid.css">
        <link rel="stylesheet" href="<?= QSC_CORE_CSS_DIRECTORY_LINK; ?>/styles.css">
        <link rel="stylesheet" href="<?= QSC_CORE_CSS_DIRECTORY_LINK; ?>/forms.css">
<?php
}

/**
 * 
 */
function qsc_core_echo_scripts_in_head() {
?>
        <script src="<?= QSC_CORE_JQUERY_LINK; ?>"></script>
        <script src="<?= QSC_CORE_JS_DIRECTORY_LINK; ?>/bootstrap.bundle.min.js"></script>
        <script src="<?= QSC_CORE_JS_DIRECTORY_LINK; ?>/config.js"></script>
        <script src="<?= QSC_CORE_JS_DIRECTORY_LINK; ?>/ajax.js"></script>
        <script src="<?= QSC_CORE_JS_DIRECTORY_LINK; ?>/forms.js"></script>
<?php
}


