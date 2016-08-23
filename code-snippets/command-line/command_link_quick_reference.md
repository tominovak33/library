Command Line Reference
#######################

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
    
    
