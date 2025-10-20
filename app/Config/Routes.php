<?php
	
use CodeIgniter\Router\RouteCollection;

date_default_timezone_set('Europe/London');

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/about-us', 'Home::about_us');
$routes->get('/treatments', 'Home::treatments');
$routes->get('/offers', 'Home::offers');
$routes->get('/treatment/(:any)', 'Home::treatment/$1');
$routes->get('/fetch-services', 'Home::fetch_services');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/contact-us', 'Home::contact_us');
$routes->post('/submit-contact-form', 'Home::submit_contact_form');
$routes->post('/send_inquiry', 'Home::send_inquiry');
$routes->get('/privacy-policy', 'Home::privacy_policy');
$routes->get('/parking-instructions', 'Home::parking_instructions');
$routes->post('/all-sub-services', 'Home::all_sub_services');
$routes->post('/add_service_in_cart', 'Home::add_service_in_cart');
$routes->post('/book-appointment-from-website', 'Home::book_appointment_from_website');
$routes->post('/book-appointment', 'Dashboard::book_appointment');
$routes->post('/fetch-slots', 'Home::fetch_slots');
$routes->get('/check-discount', 'Dashboard::check_discount');
$routes->post('/check-staff-time', 'Dashboard::check_staff_time');

$routes->get('/sign-in', 'Auth::sign_in');
$routes->post('/submit-sign-in', 'Auth::submit_sign_in');
$routes->get('/sign-up', 'Auth::sign_up');
$routes->post('/submit-sign-up', 'Auth::submit_sign_up');
$routes->get('/forgot-password', 'Auth::forgot_password');
$routes->post('/submit-forgot-password', 'Auth::submit_forgot_password');
$routes->get('/logout', 'Auth::logout');
$routes->get('/reset-password', 'Auth::reset_password');
$routes->post('/submit-reset-password', 'Auth::submit_reset_password');

$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/edit-profile', 'Dashboard::edit_profile');
$routes->get('/change-password', 'Dashboard::change_password');
$routes->post('/update-password', 'Dashboard::update_password');
$routes->post('/add-to-cart', 'Dashboard::add_to_cart');
$routes->get('/my-cart-items', 'Dashboard::my_cart_items');
$routes->get('/remove-from-cart', 'Dashboard::remove_from_cart');
$routes->get('/my-appointments', 'Dashboard::my_appointments');
$routes->post('/view-appointment', 'Dashboard::view_appointment');
$routes->get('/my-review', 'Dashboard::my_review');
$routes->post('/submit-review', 'Dashboard::submit_review');
$routes->get('/available-dates', 'Dashboard::available_dates');
