# stickee-widget

####RESTful API for calculating widget counts

#####Example requests and their responses:
Avaliable packs:
250, 500, 1000, 2000, 5000
Widgets to order:
1

Request:
```
/?packs=250,500,1000,2000,5000&order=1
```

Response:
```
{"errors":[],"packs":["5000,0","2000,0","1000,0","500,0","250,1"]}
```
---
Avaliable packs:
250, 500, 1000, 2000, 5000
Widgets to order:
250

Request:
```
/?packs=250,500,1000,2000,5000&order=250
```

Response:
```
{"errors":[],"packs":["5000,0","2000,0","1000,0","500,0","250,1"]}
```
---
Avaliable packs:
250, 500, 1000, 2000, 5000
Widgets to order:
251

```
/?packs=250,500,1000,2000,5000&order=251
```

Response:
```
{"errors":[],"packs":["5000,0","2000,0","1000,0","500,1","250,0"]}
```
---
Avaliable packs:
250, 500, 1000, 2000, 5000
Widgets to order:
501

```
/?packs=250,500,1000,2000,5000&order=501
```

Response:
```
{"errors":[],"packs":["5000,0","2000,0","1000,0","500,1","250,1"]}
```
---
Avaliable packs:
250, 500, 1000, 2000, 5000
Widgets to order:
12001

```
/?packs=250,500,1000,2000,5000&order=12001
```

Response:
```
{"errors":[],"packs":["5000,2","2000,1","1000,0","500,0","250,1"]}
```


