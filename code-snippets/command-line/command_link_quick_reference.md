# Command Line Reference


### SSH with .pem file

ssh -l root -i path/to/key/file/here.pem 33.33.33.33

### Mount NFS Share

sudo mount -t nfs 192.168.1.33:/path/to/nfs/share /home/tomi/path/to/local/folder

(Make sure NFS share has the corrent permissions)

## Git

### Remove all branches merged into current branche

    git branch --merged | grep -v "\*" | grep -v master | grep -v develop | xargs -n 1 git branch -d
    
### Remove branches when they are deleted on remote

    git fetch --prune

### Mac OS stuff

#### Installing pip

    curl https://bootstrap.pypa.io/get-pip.py -o get-pip.py
    
    python get-pip.py
    
    
## USB Tools

### Create Bootable USB Stick

Get list of disks and note label of disk to use
    
    sudo fdisk -l
    
Write ISO file to disk from above (replace sdX with the label found above)

    sudo dd bs=4M if=/path/to/<iso-file-name>.iso of=/dev/sdX status=progress && sync 
    
    
## Image Tools

Create an .ico file from a .png (Linux)

Make sure imagemagick is installed 

    sudo apt-get install imagemagick
    
Swap details in line below (eg: 128 for desired output size)    

    convert -resize x128 -gravity center -crop 128x128+0+0 input.png output.ico
