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
 * Creates a snippet of text of the desired length or less without cutting
 * off words.
 *
 * @param $text         The string to shorten to a snippet
 * @param $length       The desired length (default is
 *                      QSC_CORE_STRING_SNIPPET_LENGTH_STANDARD as defined in
 *                      constants.php)
 * @return string
 */
function qsc_core_get_snippet($text, $length = QSC_CORE_STRING_SNIPPET_LENGTH_STANDARD) {
    // Truncate the text at the desired length + 2 to allow for the end of
    // a word and a space
    $truncated_text = substr($text, 0, $length + 2);
    $truncated_text_length = strlen($truncated_text);

    // Get the position of the last space
    $last_space_index = strrpos($truncated_text, ' ');

    // Does the text cut off a word? If so, extract the text to the last space.
    if (($truncated_text_length > $length) && ($last_space_index !== false)) {
        $truncated_text = substr($truncated_text, 0, $last_space_index);

        // Get rid of the last space and add ellipsis
        $truncated_text = rtrim($truncated_text) . (($last_space_index !== false) ? " &hellip;" : "");
    }

    return $truncated_text;
}

/**
 * Merges the contents of one array into another, <strong>but<strong> in the
 * case of duplicate keys, priority is placed on the values in the first
 * (primary) array.
 *
 * @param $primary      The first array whose values have priority
 * @param $secondary    The second array whose values must be merged into the
 *                      first's
 * @return              A new array with the values merged as described
 */
function qsc_core_merge_arrays($primary, $secondary) {
    $merged_array = array();

    foreach ($secondary as $key => $value) {
        if (array_key_exists($key, $primary)) {
            $merged_array[$key] = $primary[$key];
        } else {
            $merged_array[$key] = $value;
        }
    }

    return $merged_array;
}

/**
 * Creates a copy of the given array (including keys) using clone on each
 * value.
 *
 * @param $original_array   The 1D array of elements to clone
 * @return                  A true copy of the array
 */
function qsc_core_clone_array($original_array) {
    $newArray = array();
    foreach ($original_array as $original_key => $original_value) {
        if (is_object($original_value)) {
            $newArray[$original_key] = clone $original_value;
        }
        elseif (is_array($original_value)) {
            $newArray[$original_key] = qsc_core_clone_array($original_value);                    
        }
        else {
            $newArray[$original_key] = $original_value;            
        }
    }

    return $newArray;
}

/**
 * Removes any values in both given arrays that are identical. The arrays
 * are passed by reference and the standard equivalence operator '==' is used.
 * No value is returned.
 *
 * @param $first_array      The first 1D array of values
 * @param $second_array     The second 1D array of values
 */
function qsc_core_remove_identical_values(&$first_array, &$second_array) {
    foreach ($first_array as $first_index => $first_value) {
        foreach ($second_array as $second_index => $second_value) {
            if ($first_value == $second_value) {
                unset($first_array[$first_index]);
                unset($second_array[$second_index]);
                break;
            }
        }
    }
}

/**
 * 
 * @param type $link
 * @param type $name_and_value_array
 * @return type
 */
function qsc_core_create_link_with_query_string($link, $name_and_value_array) {
    $link_with_query_string = "$link?".http_build_query($name_and_value_array);
    return filter_var($link_with_query_string, FILTER_SANITIZE_URL);
}

/**
 * Creates a URL that containing a query string with a numeric identifier.
 * It's intended to create links to 'View ...' pages and similar.
 *
 * NOTE: there is some debate regarding when to use $_GET, $_POST or
 * $_SESSION to pass information from page to page. A design decision was
 * made for 'View' pages to use $_GET so users could bookmark or use
 * their browser history to return to certain elements.
 *
 * @param $link     A string URL
 * @param $id       An integer id
 * @return          A string URL complete with a query string
 */
function qsc_core_create_link_with_id($link, $id) {
    return qsc_core_create_link_with_query_string($link, 
        array(QSC_CORE_QUERY_STRING_NAME_ID => $id));
}

/**
 * Returns the specified value from $_POST or $_GET, or null if it doesn't 
 * exist. 
 * 
 * Error handling is optional: error text can be provided and will be
 * appended to an array if there's a problem. This feature is best used if
 * you're extracting a number of values from $_POST at a time.
 *
 * @param $sga_name        See https://www.php.net/manual/en/function.filter-input.php
 * @param $key             The string key/index of the desired form value
 * @param $filter_type     The filter type; see https://www.php.net/
 *                         manual/en/filter.filters.php
 * @param $error_text      The error text to record (default of null)
 * @param $error_array     The array collecting the error text (default of
 *                         null)
 * @return                 The form value or null if nonexistent
 */
function qsc_core_extract_form_value($sga_name, $key, $filter_type, 
    $error_text = null, &$error_array = null) {
    $form_value = filter_input($sga_name, $key, $filter_type);
    if (is_string($form_value)) {
        $form_value = trim($form_value);
    }

    // If the index doesn't exist, note the error if provided
    if ((($form_value === false) || ($form_value === null)) && 
        ($error_text && $error_array)) {
        $error_array[] = $error_text;
    }

    return $form_value;
}

/**
 * Returns the specified value from $_POST or $_GET, or null if it doesn't 
 * exist. 
 * 
 * Error handling is optional: error text can be provided and will be
 * appended to an array if there's a problem. This feature is best used if
 * you're extracting a number of values from $_POST at a time.
 *
 * @param $sga_name        See https://www.php.net/manual/en/function.filter-input.php
 * @param $key             The string key/index of the desired form value
 * @param $filter_type     The filter type; see https://www.php.net/manual/en/filter.filters.php
 * @param $error_text      The error text to record (default of null)
 * @param $error_array     The array collecting the error text (default of null)
 * @return                 The form value or null if nonexistent
 */
function qsc_core_extract_form_array_value($sga_name, $key, $filter_type, 
    $error_text = null, &$error_array = null) {
    $form_array = filter_input($sga_name, $key, $filter_type, FILTER_REQUIRE_ARRAY);

    // Check that an array was returned and substitute the empty array
    // instead if not.
    if (! is_array($form_array)) {
        $form_array = array();        
    }
    
    // If the index doesn't exist, note the error if provided
    if ($error_text && $error_array) {
        $error_array[] = $error_text;                
    }

    return $form_array;
}

/**
 * Extracts a database row's numeric ID from the query string in the URL. Note 
 * that FILTER_SANITIZE_NUMBER_INT is applied.
 *
 * @param type $key_id
 * @param type $filter
 * @return  The integer ID <strong>or</strong> false on failure
 */
function qsc_core_get_id_from_get($key_id = QSC_CORE_QUERY_STRING_NAME_ID, 
    $filter = FILTER_SANITIZE_NUMBER_INT) {
    return qsc_core_extract_form_value(INPUT_GET, $key_id, $filter);
}

/**
 * Extracts a database row's numeric ID from $_POST. Note that 
 * FILTER_SANITIZE_NUMBER_INT is applied.
 *
 * @param type $key_id
 * @return  The integer ID <strong>or</strong> false on failure
 */
function qsc_core_get_id_from_post($key_id = QSC_CORE_QUERY_STRING_NAME_ID) {
    return qsc_core_extract_form_value(INPUT_POST, $key_id, 
        FILTER_SANITIZE_NUMBER_INT);
}

/**
 * 
 * @param type $db_object_array
 * @return type
 */
function qsc_core_get_db_id_array($db_object_array) {
    $db_id_array = array();
    
    foreach ($db_object_array as $db_object) {
        $db_id_array[] = $db_object->getDBID();
    }
    
    return $db_id_array;
}

/**
 * 
 * @param type $an_array
 */
function qsc_core_print_array($an_array) {
    if (empty($an_array)) : ?>
    <p>The array is empty.</p>
    <?php else: ?>
    <ul>
        <?php foreach ($an_array as $key => $value) : ?>
        <li><?= $key; ?>: <?php 
            if (is_object($value)) {
                print_r($value); 
            }
            elseif (is_array($value)) {
                qsc_core_print_array($value); 
            }
            elseif (is_bool($value)) {
                echo ($value) ? "true" : "false"; 
            }
            elseif (is_numeric($value)) {
                echo ($value === 0) ? "0" : $value; 
            }
            else {
                echo $value; 
            }

        ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif;
}

/**
 * 
 * @param type $the_array
 * @param type $the_key
 * @param type $the_default
 * @return type
 */
function qsc_core_get_array_value($the_array, $the_key, $the_default) {
    return array_key_exists($the_key, $the_array) ?
        $the_array[$the_key] :
        $the_default;
}

/**
 * 
 * @param type $to_test
 * @param type $to_echo
 * @param type $separator
 */
function qsc_core_echo_if_truthy($to_test, $to_echo = null, $separator = " ") {
    if (is_array($to_test)) {
        foreach ($to_test as $key => $value) {
            if ($key) {
                echo $separator.$value;
            }
        }        
    }
    elseif ($to_test) {
        echo $to_echo;
    }    
}


/**
 * 
 * @param type $object_array
 * @param type $function_name
 * @return type
 */
function qsc_core_map_member_function($object_array, $function_name, 
    $function_arguments = array()) {
    $result_array = array();
    foreach ($object_array as $an_object) {
        $result_array[] = call_user_func_array(array($an_object, 
            $function_name), $function_arguments);
    }
    
    return $result_array;
}


/**
 * 
 * @param type $db_date
 * @return type
 */
function qsc_core_change_db_date_to_display($db_date) {
    return date(QSC_CORE_DATE_FORMAT, strtotime($db_date));
}

/**
 * 
 * @param type $string_array
 * @return type
 */
function qsc_core_connect_strings_for_sentence($string_array) {
    $sentence_string_array = $string_array;
    $last_string = array_pop($sentence_string_array);
    
    return (empty($sentence_string_array)) ?
        $last_string :
        implode(', ', $sentence_string_array).' and '.$last_string;
    
}

/**
 * 
 * @param type $decimal
 * @return string
 */
function qsc_core_convert_decimal_to_roman_numeral($decimal) {
    $roman_numeral = '';
    $working_decimal = $decimal;

    $digit_numeral_array = array(
        10 => array('i', 'v', 'x'),
        100 => array('x', 'l', 'c'),
        1000 => array('c', 'd', 'm')
    );
    
    $low = '';
    $mid = '';
    $high = '';
    
    $quotient = 0;
    $remainder = 0;
    
    // Go through the decimal value ones digit at a time, starting 
    // with the 1s
    foreach ($digit_numeral_array as $numeral_array) {
        // Get the numerals for this digit
        $low = $numeral_array[0];
        $mid = $numeral_array[1];
        $high = $numeral_array[2];
        
        // Grab the quotient (rest of the digits) and the remainder
        // (this digit)
        $quotient = $working_decimal / 10;
        $remainder = $working_decimal % 10;
        
        // Check the remainder and build the numerals for this digit
        $prefix = '';
        if ($remainder == 9) {
            $prefix = $low.$high;            
        }
        elseif (($remainder < 9) && ($remainder > 5)) {
            $prefix = $mid.str_repeat($low, $remainder - 5);
        }
        elseif ($remainder == 5) {
            $prefix = $mid;
        }
        elseif ($remainder == 4) {
            $prefix = $low.$mid;
        }
        elseif (($remainder < 4) && ($remainder > 1)) {
            $prefix = str_repeat($low, $remainder);
        }
        elseif ($remainder == 1) {
            $prefix = $low;
        }
        
        // Add the numerals for this digit to the result
        $roman_numeral = $prefix.$roman_numeral;
        
        // Adjust the current value and exit if there are no digits lefts
        $working_decimal = $working_decimal / 10;
        if ($working_decimal == 0) {
            return $roman_numeral;
        }
    }
    
    // For values of more than 100, repeat 'm' the necessary number of times
    return str_repeat($high, $quotient).$roman_numeral; 
}


/**
 * This function provides an option for handling return values that could be
 * null. For example, the string 'None' could be used when requesting a value
 * to display to the user.
 * 
 * @param type $value
 * @param type $noneOption
 * @return type
 */
function qsc_core_get_none_if_empty($value, $noneOption = null) {
    return ($value ? $value : $noneOption);
}
