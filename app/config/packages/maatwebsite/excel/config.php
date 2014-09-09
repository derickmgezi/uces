<?php
/**
 * Part of the Laravel-4 PHPExcel package
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the LPGL.
 *
 * @package    Laravel-4 PHPExcel
 * @version    1.*
 * @author     Maatwebsite
 * @license    LGPL
 * @copyright  (c) 2013, Maatwebsite
 * @link       http://maatwebsite.nl
 */

return array(

    /*
    |--------------------------------------------------------------------------
    | Default properties
    |--------------------------------------------------------------------------
    |
    | The default properties when creating a new Excel file
    |
    */
    'properties' => array(
        'creator'           => 'UCES',
        'lastModifiedBy'    => 'UCES',
        'title'             => 'UCESsheet',
        'description'       => 'UCES spreadsheet',
        'subject'           => 'Spreadsheet export',
        'keywords'          => 'UCES, excel, export',
        'category'          => 'Excel',
        'manager'           => 'UCES',
        'company'           => 'UCES',
    ),

    /*
    |--------------------------------------------------------------------------
    | Sheets settings
    |--------------------------------------------------------------------------
    */
    'sheets' => array(

        /*
        |--------------------------------------------------------------------------
        | Default page setup
        |--------------------------------------------------------------------------
        */
        'pageSetup' => array(
            'orientation' => 'portrait',
            'paperSize' => '9',
            'scale' => '100',
            'fitToPage' => false,
            'fitToHeight' => true,
            'fitToWidth' => true,
            'columnsToRepeatAtLeft' => array('', ''),
            'rowsToRepeatAtTop' => array(0, 0),
            'horizontalCentered' => false,
            'verticalCentered' => false,
            'printArea' => null,
            'firstPageNumber' => null,
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Creator
    |--------------------------------------------------------------------------
    |
    | The default creator of a new Excel file
    |
    */

	'creator' => 'Maatwebsite',

);
