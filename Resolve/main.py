import re
import sys
import json

try:
    data = json.loads(sys.argv[1])
    a = str(data)
    b = re.findall(r'\w+', a.lower())
    p=1
    words = ["immediately", "urgent", "important", "serious", "danger", "dangerous", "urgently", "immediate", "priority"]
    for i in b:
        if i in words:
            p = 1
        else:
            p = 0
    # Generate some data to send to PHP
    result = p

    # Send it to stdout (to PHP)
    print(json.dumps(result))
except:
    print ("ERROR")
    sys.exit(1)