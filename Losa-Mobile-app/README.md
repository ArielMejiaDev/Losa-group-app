# How to install Flutter on Mac 

- Install Visual Studio Code: https://code.visualstudio.com

- Install Android Studio: https://developer.android.com/studio

- Install Flutter: https://flutter.dev/docs/get-started/install/macos

- Add the Flutter plugin on Android Studio: 
  1. open Android studio, 
  2. click on settings, 
  3. click on pluggins, 
  4. in searchbox type "flutter" and install, 
  5. it would ask permission to download Dart as dependency because Flutter use dart as language, click ok, 
  6. wait to finish the installation then it will ask to reload Android studio, click ok.

- install xcode: https://flutter.dev/docs/get-started/install/macos#install-xcode


# calendar carousel model event change file
```dart
import 'package:flutter/material.dart';

class Event {
  final DateTime date;
  final String title;
  final String dateStart;
  final String timeStart;
  final String dateEnd;
  final String timeEnd;
  final String eventDate;
  final Widget icon;

  Event({this.date, this.title, this.dateStart, this.timeStart, this.dateEnd, this.timeEnd, this.icon, this.eventDate}) : assert(date != null);

  @override
  bool operator ==(other) {
    return this.date == other.date &&
        this.title == other.title &&
        this.dateStart == other.dateStart &&
        this.timeStart == other.timeStart &&
        this.dateEnd == other.dateEnd &&
        this.timeEnd == other.timeEnd &&
        this.eventDate == other.eventDate &&
        this.icon == other.icon;
  }
}
```
