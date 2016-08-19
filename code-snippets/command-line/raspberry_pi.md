# Raspberry PI related/specific commands

Commands for the raspberry pi, either specifically for the PI and its accessories (such as camera and GPIO commands) or more generic Linux commands that are useful for PI use

## Camera

#### Allow specific user to access camera:

  If getting the following error: `failed to open vchiq instance`, add the current user to the `video` group:

  `usermod -a -G video <user_name>`
