# Josh's CodeIgniter Template

This is a blank [CodeIgniter](http://codeigniter.com) 1.7.2 project
with the following enhancements:


## ActionMailer for Email

Load mailers with `$this->load->mailer('mailer_file')`. Mailers
should be kept in `application/mailers`. See the [repo](http://github.com/itspriddle/codeigniter-action-mailer)
for more info.


## Easy View Loading

Views are automatically loaded and rendered for non AJAX requests.
They should be kept in a file named `views/[CONTROLLER]/[METHOD].php`.

Eg: For the URL `/users/new`, the view would be at `views/users/new.php`.

View data is kept in an array, `$this->view_data`, within controllers.

The general app layout should be defined in `views/layouts/application.php`.
To print the controller's content, use the variable `$content`.


## Script Runner

Run controller actions with `/script/runner --run=/controller/method`.
Run `/script/runner` for more info.


## Flash Messages Helper

Use `flash::success($message)` or `flash::error($message)`. Print in
your layout with `flash::display()`.
