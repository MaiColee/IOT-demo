# IOT-demo

- IOT demo with multiple stages.

Webpage hosted on the local network to change the database entry.

Database connected to the webpage to host persistent data which the Pi will read from. (Must be configured manually)

Raspberry Pi running a python script with cron reading the database with very short intervals to minimize latency. LED is connected and the python script uses a module to control this. This represents for example, a lightbulb.

DATABASE MUST BE CONFIGURED TO ALLOW CONSTANT READS. Many relational database services allow this. I recommend MySQL and altering the config.
