# Database debug_backtrace logger

## Cases:

* In log file You have a lot of errors without information about error
* Time to time You have some important error but you can los in not important (Standard errors)



Custom Logger that storage in database ( 'ev_backtrace_log' ) message and debug backtrace but without dates

To message in log file add id from ev_backtrace_log

ev_backtrace_log
* id - md5 from debug_backtrace
* message - logger message
* debug - print_r(debug_backtrace(2),1);
* counter - increment on duplicate id


