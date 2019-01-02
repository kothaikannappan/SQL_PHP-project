var auto_id = 0;
var ptr = db.Article.find();

while (ptr.hasNext()){
    var doc = ptr.next(); 
        var row = {"_id":doc.journal_id.ftext,"name":doc.journal.ftext};
        db.mongo_Magazine.insert(row);
    }


