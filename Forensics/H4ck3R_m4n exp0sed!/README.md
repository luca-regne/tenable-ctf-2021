## Flag 1
This chall gave me a pcap with FTP communications without secure encryption. Analising files transfered I saw a interesting image.
![FTP-DATA](wireshark.png)

First I exported data from wireshark to '.bin' file and after concatenate it in single file.
```bash
cat butter1.bin butter2.bin > butter.jpg
```
![falg2](./butter/butter.jpg)

# Flag 2
The second flag is very similar to first.
Exporting "supersecure.7z" content.
![FTP-DATA](wireshark2.png)
```bash
cat supersecure1.bin supersecure2.bin supersecure3.bin supersecure4.bin supersecure5.bin supersecure6.bin supersecure7.bin supersecure8.bin supersecure9.bin supersecure10.bin supersecure11.bin supersecure12.bin supersecure13.bin supersecure14.bin supersecure15.bin supersecure16.bin supersecure17.bin supersecure18.bin supersecure19.bin supersecure20.bin supersecure21.bin supersecure22.bin supersecure23.bin supersecure24.bin > supersecure.7z
```
In "compressssion_info.txt":
``The password for the compressed file is "bbqsauce"``

Extract image and get the flag :)
![falg2](./supersecure/supersecure_unzip/pickle_nick.png)