## Loopback Mic Audio Into Headphones / Speakers

* Install Pulse Audio

`sudo apt-get install pavucontrol`

* Configure inputs and outputs accordingly

* Start loopback of mic audio into audio output

`pactl load-module module-loopback latency_msec=1`

* Stop loopback when desired

`pactl unload-module module-loopback`
