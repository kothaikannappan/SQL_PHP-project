import csv
import json

# Open the CSV
f = open( './Author.csv', 'rU' )
# Change each fieldname to the appropriate field name. I know, so difficult.
reader = csv.DictReader( f, fieldnames = ( "Author_id","Name" ))
# Parse the CSV into JSON
out = json.dumps( [ row for row in reader ] )
print ("JSON parsed!")
# Save the JSON
f = open( 'Author.json', 'w')
f.write(out)
print ("JSON saved!")
