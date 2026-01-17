# 6COSC019W-uow
This is the Module repository for the level 6 Cyber Security module (6COSC019W) at the university of Westmisnter.


# how to use switch-dns.sh

A simple Bash script to switch between different DNS configurations by replacing  
`/etc/resolv.conf` with predefined profiles (e.g. university vs home).

The script also locks the file to prevent NetworkManager or systemd from overwriting it.

---

## Requirements

- Linux  
- Root access (sudo)  
- `chattr` available  

---

## Setup

### 1. Create the script file

```bash
nano switch-dns.sh
```
On gitbub, click on the switch-dns.sh script, copy it and Paste the script content in the nano terminal, then press:
Ctrl + X
Y
Enter

to save and exit.
### 2. Make it executable
```bash
chmod +x switch-dns.sh
```
## Usage

### Switch to university DNS:
```bash
sudo ./switch-dns.sh uni
```
### Switch to home DNS:
```bash
sudo ./switch-dns.sh home
```

### Check current status:
```bash
sudo ./switch-dns.sh status
```

### Show current DNS configuration:
```bash
sudo ./switch-dns.sh show
```
