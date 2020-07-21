import 'dart:async';

class LoginValidator {

  final validateEmail = StreamTransformer<String, String>.fromHandlers(
    handleData: (email, sink){
      if (email.contains('@')) {
        sink.add(email);
      } else {
        sink.addError('Por favor ingrese un email valido');
      }
    }
  );

  final validatePassword = StreamTransformer<String, String>.fromHandlers(
    handleData: (password, sink){
      if (password.length > 3) {
        sink.add(password);
      } else {
        sink.addError('el password es muy corto');
      }
    }
  );

}