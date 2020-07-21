import '../resources/login_resource_api.dart';
import '../resources/stored_device_data.dart';

class LoginRespository {

  //props 
  final loginApi = LoginResourceApi();//instd token for nexts sessions
  final String authToken = 'false';//no bool because shared pref packages not support bool
  //final String userId = '';
  final loginStoredData = StoredDeviceData();

  //methods 
  auth({email, password}) async {
    //get data stored in shared preference phone
    final authStatus = await loginApi.auth(email: email, password: password);//get result of http post request with user data
    if (authStatus['authenticated'] == true) {
      final storedData = await loginStoredData.getStoredData();
      storedData.setBool(authToken, true);//set the token true for next sessions
      storedData.setInt('userId', authStatus['data']['id']);
      return authStatus;//and return true because everything its OK
    }
    print('El status desde el repository es: $authStatus');//else print the value and return the value
    return authStatus;
  }

}