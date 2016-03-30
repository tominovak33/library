import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Scanner;

public class CsvReader {

	public static void main(String[] args) throws FileNotFoundException {		
        Scanner scanner = new Scanner(new File("inFile.csv"));
        String line = null;
        Scanner csvScan = null;
        int lineNum = 0;
        int colNum = 0;
        String col;
        String colName;
        ArrayList<String> colNames = new ArrayList<String>();
		List<HashMap<String, String>> items = new ArrayList<HashMap<String, String>>();

        while(scanner.hasNextLine()) {
        	line = scanner.nextLine();
    		colNum = 0;
        	csvScan = new Scanner(line);
        	csvScan.useDelimiter(",");
			HashMap<String, String> itemDeatails = new HashMap<String, String>();
        	while (csvScan.hasNext()) {
        		col = csvScan.next();
        		if (lineNum == 0) {
        			// get col names as this is the first row
        			colNames.add(col);
        		}
        		colName = colNames.get(colNum); // get the name of the corresponding column based on the heading names obtained above from the first row
        		itemDeatails.put(colName, col);
        		colNum++;
        	}
        	
        	System.out.println(itemDeatails);
			items.add(itemDeatails);
        	lineNum++;
        }
        csvScan.close();
        scanner.close();
	}
}
