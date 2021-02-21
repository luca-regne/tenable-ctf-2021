## Challenge
Follow the rabbit hole and get the flag.

http://167.71.246.232/

Alternate URL: http://167.71.246.232:8080/rabbit_hole.php
## Solution
Automation request and get content
```powershell
$req='cE4g5bWZtYCuovEgYSO1';do{$res = Invoke-WebRequest -Uri ('http://167.71.246.232:8080/rabbit_hole.php?page='+$req.Trim()); Write-Output $res.Content >> rabbit_hole.log;$req = $res.Content.Split(']')[1];}while($res.Content -ne 3);
```

Output - [rabbit_hole.log](./rabbit_hole.log)

In VSCode I selected all lines with '[' and past in another file removing all '[' and ']'.
I saw that numbers in begging at line was possible index and the rest a simple HEX, then I sorted file with bash. And finally I concatenated HEX in another file. The firsts 8 HEX's - `89 50 4E 47 0D 0A 1A 0A` - is the File Signature for PNG file.

## Flag

![flag](./image.png)