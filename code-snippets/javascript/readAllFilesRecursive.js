var path = require('path');
var fs = require('fs');

module.exports = {
  getAllFiles: function (folder, callback) {
    var files = [];

    fs.readdir(folder,function(err, items){
       if (err) {
         console.error(err);
         return;
       }

       var amount = items.length;
       if (!amount) {
         callback(files);
       }

       items.forEach(function (item){
         var filePath = path.join(folder, item);
         fs.stat(filePath, function(err, fileStats) {
           if (fileStats.isDirectory()) {
             //console.log("Found Folder: " + filePath);
             getItems(filePath+'/', function(innerList) {
               files = files.concat(innerList) // Add the inner folders list to the main list
               amount -= 1;
               if (!amount) {
                 callback(files);
               }
             });
           } else {
             //console.log("Found Item: " + filePath);
             files.push(filePath);
             amount -= 1;
             if (!amount) {
               callback(files);
             }
           }
         });
       });
    });
  }
};
