var auto_id = 0;
var ptr = db.Article.find();

while (ptr.hasNext()){
    var doc = ptr.next(); 
        var row = {"title":doc.title.ftext,"Volume_id":doc.volume.ftext,"Mag_id":doc.journal_id.ftext,"page-no": doc.pages.ftext,"Author_id": doc.Author_id.ftext};
        db.mongo_Article.insert(row);
    }


