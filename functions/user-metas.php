<?php 
use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', __('mos_user_meta_options'));

function mos_user_meta_options() {
    Container::make('user_meta', 'User Data')
    ->add_fields(array(
        Field::make('image', 'mos_profile_image', __('Profile Image'))
        ->set_type(array('image'))
        ->set_value_type('url')
        ->set_help_text(__("Image size must be 512x512px.")),
        Field::make('text', 'mos_profile_designation', __('Designation')),
        Field::make('text', 'mos_profile_linkedin', __('LinkedIn')),
        /*
        Field::make('radio','marketing_email', __('I would like to recieve occasional marketing emails'))
        ->set_options( array(
            'yes' => "Yes",
            'no' => "No",
        )),
        Field::make('text', 'biz_journey', __('Where are you in your biz journey?')),
        Field::make('text', 'your_industry', __('What is your industry?')),
        Field::make('text', 'your_interest', __('What top 3 topics are you interested in?')),        
        Field::make('radio','privacy_policy', __('I agree to Privacy policy and Terms of Use'))
        ->set_options( array(
            'yes' => "Yes",
            'no' => "No",
        )),
        Field::make('text', 'pricing', __('Pricing')),
        */
    ));
}