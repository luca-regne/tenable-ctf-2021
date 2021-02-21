## Chall
This chall is a simple Java Web Application.</br> 
As the chall gave the [source code](./Project) only simple 'code review' is necessary to understand the routes in application and get the first 6 flags.

## Flag 1

### Code
```Java
	@GetMapping("/main")
        public ModelAndView getMain() {
		ModelAndView modelAndView = new ModelAndView("flag");
                modelAndView.addObject("flag", flags.getFlag("spring_mvc_1"));	// get main
                return modelAndView;
        }
```
### Request

```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main).Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag1_517d74}</p>
    </body>
    </html>
```

## Flag 2 and 3

### Code
```Java
	@PostMapping("/main")
        public String postMain(@RequestParam(name="magicWord", required=false, defaultValue="") String magicWord, Model model) {
		if (magicWord.equals("please"))
			model.addAttribute("flag", flags.getFlag("spring_mvc_3"));	// post main param 
		else
                	model.addAttribute("flag", flags.getFlag("spring_mvc_2"));	// post main
                return "flag";
        }
```
### Request to get Flag 2
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main -Method Post -Body '').Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag2_de3981}</p>
    </body>
    </html>
```

### Request to get Flag 3
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main -Method Post -Body 'magicWord=please').Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag3_0d431e}</p>
    </body>
    </html>
```

## Flag 4

### Code
```Java
	@PostMapping(path = "/main", consumes = "application/json")
	public String postMainJson(Model model) {
                model.addAttribute("flag", flags.getFlag("spring_mvc_4"));	// post main flag json
                return "flag";
        }
```
### Request
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main -Method Post -ContentType 'application/json' -Body '{}').Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag4_695954}</p>
    </body>
    </html>
```

## Flag 5

### Code
```Java
	@RequestMapping(path = "/main", method = RequestMethod.OPTIONS)
        public String optionsMain(Model model) {
                model.addAttribute("flag", flags.getFlag("spring_mvc_5"));	// options main
                return "flag";
        }
```
### Request
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main -Method Options).Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag5_70102b}</p>
    </body>
    </html>
```

## Flag 6

### Code
```Java
	@RequestMapping(path = "/main", method = RequestMethod.GET, headers = "Magic-Word=please")
        public String headersMain(Model model) {
                model.addAttribute("flag", flags.getFlag("spring_mvc_6"));	// headers main
                return "flag";
        }
```
### Request
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/main -Method Get -Headers @{'Magic-Word'='please'}).Content
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Tenable CTF: Spring MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
            <p >flag{flag6_ca1ddf}</p>
    </body>
    </html>
```
## Flag 7

### Code
```html
	<p th:if="${name == 'please'}">
	<span class="hidden" th:text="${@flagService.getFlag('hidden_flag')}" />
	</p>
```
### Request
```powershell
(Invoke-WebRequest http://challenges.ctfd.io:30542/?name=please).Content
<!DOCTYPE HTML>
<html>
<head>
    <title>Tenable CTF: Spring MVC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
        span.hidden { color:white; }
    </style>
</head>
<body>
        <p >Hello, please!</p>
        <p>
        <span class="hidden" >flag{hidden_flag_1dbc4}</span>
        </p>

</body>
</html>
```
## Flag 7

### Code
```Java
	@GetMapping("/other")
	public String index(@RequestParam(name="name", required=false, defaultValue="user") String realName, HttpSession session, Model model) {
		session.setAttribute("realName", realName);
		model.addAttribute("name", realName);
		return "hello";
	}
```
```html
	<p th:if="${#session.getAttribute('realName') == 'admin'}">
	<span th:text="${#session.getAttribute('sessionFlag')}" />
	</p>
```
### Request
```powershell
Write-Output 'Set Session';(Invoke-WebRequest http://challenges.ctfd.io:30541/other?name=admin -SessionVariable session).StatusCode;(Invoke-WebRequest http://challenges.ctfd.io:30541/ -WebSession $session).Content
```



	