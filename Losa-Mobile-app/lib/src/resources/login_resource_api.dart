import 'package:http/http.dart' as http;
import 'dart:convert';

class LoginResourceApi {

  //props 
  //final url = 'http://104.214.71.209/api/v1/login';
  final url = 'http://23.100.120.18/api/v1/login';
  //methods
  auth({email, password}) async {
    print('Submitting to server from resource API with email: $email & password: $password');
    final response = await http.post(url, 
      headers: { 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' }, 
      body: { 'email' : email, 'password' : password }
    );
    print('status desde el resource ${json.decode(response.body)['authenticated']}');
    final authStatus = json.decode(response.body);
    return authStatus;

  }

}