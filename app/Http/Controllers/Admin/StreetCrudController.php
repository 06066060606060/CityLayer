<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StreetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StreetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StreetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  //  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Http\Controllers\Admin\Operations\ExportStreetOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Street::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/street');
        CRUD::setEntityNameStrings('street', 'streets');
    }

    function getFieldsData()
    {
        $this->crud->addColumn([
            'name' => 'image0',
            'label' => 'Image Feeling',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => 'auto',

        ]);

    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setOperationSetting('lineButtonsAsDropdown', true);
        CRUD::column('name')->label('uuid');
        CRUD::column('user_id');
        $this->getFieldsData();
        CRUD::column('latitude');
        CRUD::column('longitude');
        CRUD::column('likes')->label('Like')->type('number');
        CRUD::column('dislikes')->label('dislike')->type('number');
        CRUD::column('stars')->label('pleasant')->type('number');
        CRUD::column('bof')->label('indifferent')->type('number');
        CRUD::column('weird')->label('worried')->type('number');
        $this->crud->enableExportButtons();

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StreetRequest::class);
        CRUD::field('user_id')->tab('Page 1')->wrapper(['class' => 'form-group col-md']);
        CRUD::addField([ // Text
            'name'  => 'name',
            'label' => 'Identifier',
            'type'  => 'text',
            'tab'             => 'Page 1',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]);
        CRUD::addField([ // Text
            'name'  => 'longitude',
            'label' => 'Longitude',
            'type'  => 'text',
            'tab'             => 'Page 1',
            'wrapper' => [ 'class' => 'form-group1 col-md pl-3'],
        ]);
        CRUD::addField([ // Text
            'name'  => 'latitude',
            'label' => 'Latitude',
            'type'  => 'text',
            'tab'             => 'Page 1',
            'wrapper' => [ 'class' => 'form-group1 col-md pl-3'],
        ]);

        CRUD::addField([ // Text
            'name'  => 'feeling',
            'label' => 'Feeling',
            'type'  => 'text',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'description',
            'label' => 'Why this feeling',
            'type'  => 'textarea',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'change',
            'label' => 'Change level',
            'type'  => 'number',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'description2',
            'label' => 'What would you change',
            'type'  => 'textarea',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'confort',
            'label' => 'How comfortable',
            'type'  => 'number',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'rest',
            'label' => 'place to rest level',
            'type'  => 'number',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'rest_text',
            'label' => 'place to rest text',
            'type'  => 'textarea',
            'tab'   => 'Page 1',
        ]);

        CRUD::addField([ // Text
            'name'  => 'movement',
            'label' => 'walk, roll, bike comfort level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'movement_text',
            'label' => 'walk, roll, bike comfort text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'activities',
            'label' => 'play, exercice, activities level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'activities_text',
            'label' => 'play, exercice, activities text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'orientation',
            'label' => 'visibility & orientation level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'orientation_text',
            'label' => 'visibility & orientation text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'weather',
            'label' => 'rain & wind protection level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'weather_text',
            'label' => 'rain & wind protection text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'facilities',
            'label' => 'facilities level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'facilities_text',
            'label' => 'facilities text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);

        
        CRUD::addField([ // Text
            'name'  => 'enjoyable',
            'label' => 'How enjoyable is this space',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'noise',
            'label' => 'noise level',
            'type'  => 'number',
            'tab'   => 'Page 2',
        ]);

        CRUD::addField([ // Text
            'name'  => 'noise_text',
            'label' => 'noise text',
            'type'  => 'textarea',
            'tab'   => 'Page 2',
        ]);


        CRUD::addField([ // Text
            'name'  => 'beauty',
            'label' => 'beauty level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'beauty_text',
            'label' => 'beauty text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'cleanliness',
            'label' => 'cleanliness level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'cleanliness_text',
            'label' => 'cleanliness text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'plants',
            'label' => 'plants & trees level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'plants_text',
            'label' => 'plants & trees text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'talking',
            'label' => 'talking & listening level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'talking_text',
            'label' => 'talking & listening text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'sunlight',
            'label' => 'sunlight level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'sunlight_text',
            'label' => 'sunlight text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'shade',
            'label' => 'shade level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'shade_text',
            'label' => 'shade text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'interesting',
            'label' => 'interesting sights level',
            'type'  => 'number',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'interesting_text',
            'label' => 'interesting sights text',
            'type'  => 'textarea',
            'tab'   => 'Page 3',
        ]);

        CRUD::addField([ // Text
            'name'  => 'protection',
            'label' => 'protection level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'protection_text',
            'label' => 'protection text',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'polluants',
            'label' => 'polluants level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'polluants_text',
            'label' => 'polluants text',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'night',
            'label' => 'night light level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'night_text',
            'label' => 'night light text',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'hazards',
            'label' => 'other hazards',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'dangerous',
            'label' => 'dangerous objects level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'dangerous_text',
            'label' => 'dangerous objects text',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'protection_harm',
            'label' => 'safety from harm level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'protection_harm_text',
            'label' => 'safety from harm text',
            'type'  => 'textarea',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'spaceusage',
            'label' => 'how the space is used level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'spend_time',
            'label' => 'fun to spend time level',
            'type'  => 'number',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'time_spending',
            'label' => 'fun to spend time  text',
            'type'  => 'text',
            'tab'   => 'Page 4',
        ]);

        CRUD::addField([ // Text
            'name'  => 'meeting',
            'label' => 'meeting with friend level',
            'type'  => 'number',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'meeting_text',
            'label' => 'meeting with friend  text',
            'type'  => 'textarea',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'events',
            'label' => 'events level',
            'type'  => 'number',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'events_text',
            'label' => 'events text',
            'type'  => 'textarea',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'multifunctional',
            'label' => 'multifunctional level',
            'type'  => 'number',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'multifunctional_text',
            'label' => 'multifunctional text',
            'type'  => 'textarea',
            'tab'   => 'Page 5',
        ]);

        CRUD::addField([ // Text
            'name'  => 'usagedetail',
            'label' => 'who use this space',
            'type'  => 'text',
            'tab'   => 'Page 5',
        ]);



        CRUD::addField([ // Text
            'name'  => 'likes',
            'label' => 'likes number',
            'type'  => 'number',
            'tab'   => 'Page 5',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]);

        CRUD::addField([ // Text
            'name'  => 'dislikes',
            'label' => 'dislikes number',
            'type'  => 'number',
            'tab'   => 'Page 5',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]); 

        CRUD::addField([ // Text
            'name'  => 'stars',
            'label' => 'pleasant number',
            'type'  => 'number',
            'tab'   => 'Page 5',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]); 

        CRUD::addField([ // Text
            'name'  => 'bof',
            'label' => 'indifferent number',
            'type'  => 'number',
            'tab'   => 'Page 5',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]); 

        CRUD::addField([ // Text
            'name'  => 'weird',
            'label' => 'worried number',
            'type'  => 'number',
            'tab'   => 'Page 5',
            'wrapper' => [ 'class' => 'form-group col-md pl-3'],
        ]); 

    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
