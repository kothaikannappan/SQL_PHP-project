var auto_id = 0;
var ptr = db.Article.find();

while (ptr.hasNext()){
    var doc = ptr.next(); 
        var row = {"Volume_id":doc.volume.ftext,"mag_id":doc.journal_id.ftext,"year": doc.year.ftext};
        db.mongo_Volume.insert(row);
auto_id++;
    }


