endpoint | parameters | response
--- | --- | ---
POST / | paste (text to upload) | `text/plain` link to new page
GET /pastes/* | n/a | `text/plain` body of the paste

example of cli script using python:
```
#!/usr/bin/env python

PASTESERVER_URL = "http://paste.mydoma.in"

import requests
import sys
f = None
try:
	f = open(sys.argv[1], "r")
except FileNotFoundError:
	print("file does not exist");sys.exit(2)
fr = f.read()
if fr == "": sys.exit(1)
r = None
try:
	r = requests.post(PASTESERVER_URL, data={"paste": fr})
except:
	print("error querying server");sys.exit(3)
f.close()
print(r.text)

```
