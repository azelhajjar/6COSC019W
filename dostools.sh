#! /usr/bin/bash

null="> /dev/null 2>&1"
r="\033[1;31m"
b="\033[1;34m"
w="\033[0m"
export USER=$(whoami)



#STudent ID for screenshots script!
cd /home/kali/Desktop
git clone https://github.com/gkbrk/slowloris.git
git clone https://github.com/jseidl/GoldenEye.git
cd /home/kali/
git clone https://github.com/palahsu/DDoS-Ripper.git

