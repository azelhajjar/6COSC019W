#!/usr/bin/env bash
# switch-dns.sh — manage /etc/resolv.conf profiles (university vs home)
# Usage:
#   sudo ./switch-dns.sh uni
#   sudo ./switch-dns.sh home
#   sudo ./switch-dns.sh status
#   sudo ./switch-dns.sh show

set -euo pipefail

TARGET="/etc/resolv.conf"
UNI_FILE="/etc/resolv.conf.uni"
HOME_FILE="/etc/resolv.conf.home"

need_root() {
  if [ "${EUID:-$(id -u)}" -ne 0 ]; then
    echo "ERROR: please run as root (use sudo)" >&2
    exit 1
  fi
}

unlock() { chattr -i "$TARGET" 2>/dev/null || true; }
lock()   { chattr +i "$TARGET" 2>/dev/null || true; }
backup() {
  if [ -f "$TARGET" ]; then
    cp -a "$TARGET" "/etc/resolv.conf.bak.$(date +%Y%m%d-%H%M%S)"
  fi
}

init_profiles() {
  if [ ! -f "$UNI_FILE" ]; then
    echo "Creating $UNI_FILE"
    tee "$UNI_FILE" >/dev/null <<'EOF'
search localdomain
nameserver 161.74.92.25    # University DNS
nameserver 161.74.92.50     
nameserver 8.8.8.8     # Google DNS
EOF
  fi

  if [ ! -f "$HOME_FILE" ]; then
    echo "Creating $HOME_FILE"
    tee "$HOME_FILE" >/dev/null <<'EOF'
nameserver 8.8.8.8
nameserver 1.1.1.1
EOF
  fi
}

status() {
  echo "Active: $TARGET"
  if command -v lsattr >/dev/null 2>&1; then
    echo -n "Immutable flag: "
    if lsattr "$TARGET" 2>/dev/null | awk '{print $1}' | grep -q 'i'; then
      echo "set (+i)"
    else
      echo "not set"
    fi
  fi
  if [ -f "$UNI_FILE" ] && cmp -s "$TARGET" "$UNI_FILE"; then
    echo "Profile match: university"
  elif [ -f "$HOME_FILE" ] && cmp -s "$TARGET" "$HOME_FILE"; then
    echo "Profile match: home"
  else
    echo "Profile match: unknown (does not match saved profiles)"
  fi
}

show() {
  echo "----- $TARGET -----"
  cat "$TARGET"
}

switch_to() {
  local src="$1" label="$2"
  echo "Switching DNS to: $label"
  unlock
  backup
  cp -f "$src" "$TARGET"
  lock
  echo "Done. Current head of $TARGET:"
  head -n 5 "$TARGET"
}

main() {
  need_root
  init_profiles
  case "${1:-}" in
    uni)  switch_to "$UNI_FILE" "university";;
    home) switch_to "$HOME_FILE" "home";;
    status) status;;
    show) show;;
    *) echo "Usage: sudo $0 {uni|home|status|show}"; exit 2;;
  esac
}

main "$@"
