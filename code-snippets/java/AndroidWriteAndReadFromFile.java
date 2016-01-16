public void writeData (View view) {
    try {
        FileOutputStream fOut = openFileOutput ("testFile.txt" , Context.MODE_PRIVATE);
        OutputStreamWriter osw = new OutputStreamWriter(fOut);
        osw.write("Test content of the file");
        osw.flush();
        osw.close();
    } catch (Exception e) {
        e.printStackTrace();
    }
}

public void readSavedData (View view) {
    StringBuffer fileData = new StringBuffer("");
    try {
        FileInputStream fIn = openFileInput ("testFile.txt");
        InputStreamReader isr = new InputStreamReader(fIn);
        BufferedReader buffreader = new BufferedReader(isr);

        String readString = buffreader.readLine();
        while (readString != null) {
            fileData.append(readString);
            readString = buffreader.readLine();
        }

        isr.close();
    } catch (Exception e) {
        e.printStackTrace();
    }

    System.out.println("Start Read");
    System.out.println(fileData.toString());
    System.out.println("End Read");
}
