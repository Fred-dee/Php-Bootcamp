# file = open("elements.json", "r")
# elem_file = file.read()
# file.close
# el = json.loads(elem_file)
with open("elements.json") as el_file:
   el = json.load(el_file)
   print("<!DOCTYPE html>")
   print('<html>')
   print('<head>')
   print('<style>')
   print('<link href="style.css" rel="stylesheet" type="text/css" media="all">')
   print('<style>')
   print('</head>')
	print('<body>')
	print ('<div class = "flex-grid"')
   for i in range(118):
		if(i )
       print('<div class="atom>')
       print('<p class="symbol"><b>' + str(el['elements'][i]['number']) + '</b></p>')
       print('<p class="symbol"><b>' + el['elements'][i]['symbol'] + '</b></p>')
       print('<p class="mass">' + str(el['elements'][i]['atomic_mass']) + '</p>')
       print('</div>\n')
	print('</body>')
	print('</html>')