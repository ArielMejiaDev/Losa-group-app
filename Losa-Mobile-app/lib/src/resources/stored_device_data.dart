import 'package:shared_preferences/shared_preferences.dart';

class StoredDeviceData {

  //props 
  
  //constructors 
  

  //methods
  getStoredData() async {

    final SharedPreferences prefs = await SharedPreferences.getInstance();
    return prefs;

  }

}