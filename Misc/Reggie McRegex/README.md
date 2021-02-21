## Chall
Find the flag in the attached file containing a haystack. Not including the quotes, the flag will be in the format of "flag{here_is_a_flag}". The text between the curly braces can consist of lowercase characters and underscores and be a maximum length of 16. You'll know it when you see it.

## Solution
I simple tried regex with 16 length instead of max 16 and luckily got the flag.
```bash
grep -o -E 'flag{[[:alpha:]|_]{16}}' haystack.txt
```

### Flag
``flag{thy_flag_is_this}``