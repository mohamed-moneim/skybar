
//main.dart
/*
import 'dart:async';

import 'package:flutter/material.dart';



class offers extends StatefulWidget {
  final String title;
  const offers({Key? key, required this.title}) : super(key: key);

  @override
  Offers createState() => Offers();
}

class Offers extends State<offers> {
  static const PAGE_SIZE = 30;

  bool _allFetched = false;
  bool _isLoading = false;
  List<ColorDetails> _data = [];

  DocumentSnapshot? _lastDocument;

  @override
  void initState() {
    super.initState();
    _fetchFirebaseData();
  }

  Future<void> _fetchFirebaseData() async {
    if (_isLoading) {
      return;
    }
    setState(() {
      _isLoading = true;
    });
    /*
    Query _query = FirebaseFirestore.instance
        .collection("sample_data")
        .orderBy('color_label');
    if (_lastDocument != null) {
      _query = _query.startAfterDocument(_lastDocument!).limit(PAGE_SIZE);
    } else {
      _query = _query.limit(PAGE_SIZE);

     */
  }

  final List<ColorDetails> pagedData = await _query.get().then((value) {
  if (value.docs.isNotEmpty) {
  _lastDocument = value.docs.last;
  } else {
  _lastDocument = null;
  }
  return value.docs
      .map((e) => ColorDetails.fromMap(e.data() as Map<String, dynamic>))
      .toList();
  });

  setState(() {
  _data.addAll(pagedData);
  if (pagedData.length < PAGE_SIZE) {
  _allFetched = true;
  }
  _isLoading = false;
  });
}

@override
Widget build(BuildContext context) {
  return Scaffold(
    appBar: AppBar(
      title: Text(widget.title),
    ),
    body: NotificationListener<ScrollEndNotification>(
      child: ListView.builder(
        itemBuilder: (context, index) {
          if (index == _data.length) {
            return Container(
              key: ValueKey('Loader'),
              width: double.infinity,
              height: 60,
              child: Center(
                child: CircularProgressIndicator(),
              ),
            );
          }
          final item = _data[index];
          return ListTile(
            key: ValueKey(
              item,
            ),
            tileColor: Color(item.code | 0xFF000000),
            title: Text(
              item.label,
              style: TextStyle(color: Colors.white),
            ),
          );
        },
        itemCount: _data.length + (_allFetched ? 0 : 1),
      ),
      onNotification: (scrollEnd) {
        if (scrollEnd.metrics.atEdge && scrollEnd.metrics.pixels > 0) {
          _fetchFirebaseData();
        }
        return true;
      },
    ),
  );
}
}

class ColorDetails {
  final String label;
  final int code;
  ColorDetails(this.code, this.label);

  factory ColorDetails.fromMap(Map<String, dynamic> json) {
    return ColorDetails(json['color_code'], json['color_label']);
  }

  Map toJson() {
    return {
      'color_code': code,
      'color_label': label,
    };
  }
}
*/
