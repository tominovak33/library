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

    convert -resize x128 input.png output.ico
    
    
## Offline Website

Clone a website to use offline

wget -p -k -m --read-timeout=60 --user-agent='<user-agent>' -r -w 1 -e robots=off --content-disposition <website-url>


## Rename Files

(Remove spaces from filenames and lowercase them)

#### Swap spaces to underscores in file and foldernames

    `find ./<target-folder>/ -depth -name "* *" -execdir rename 's/ /_/g' "{}" \;`

##### Lowercase names of files and folders

    `find ./<target-folder>/ -depth -exec rename 's/(.*)\/([^\/]*)/$1\/\L$2/' {} \;`


## Google Cloud Storage

#### Set cache times for content in google cloud storage bucket

Set 10 day cache time for all items in a bucket

    `gsutil setmeta -h "Cache-Control:public,max-age=864000" -r gs://<bucket-name>/* `
