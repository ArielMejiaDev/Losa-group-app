import 'package:rxdart/rxdart.dart';
import '../repositories/properties_repository.dart';

class PropertiesBloc {

  //props 
  final _propertiesRepository = PropertiesRepository();
  final _properties = PublishSubject<List <dynamic>>();

  //add to stream 
  Observable <List <dynamic>> get properties => _properties.stream; 

  //methods  
  //sink add (method to output )
  
  getProperties() async {

    final ids = await _propertiesRepository.getProperties();
    //print('bloc returns :$ids');
    _properties.sink.add(ids);
  }

  //dispose 
  dispose() {

    _properties.close();

  }

}