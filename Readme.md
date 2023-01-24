### It reads the whole file and you can perform a series of operations on it

#### It is very easy to use

Install
```
 composer require hasan-22/open
```
### Functions
| Function | Description                                                    |            Example            |
|----------|:---------------------------------------------------------------|:-----------------------------:|
| ready  | Checks that the class it creates has not already been created  |                               |
| open   | Open file as array                                             |     open('filePath.txt')      |
| write   | Writes the changes to the file                                             |       |
| readLines    | Returns an array of file lines                                 ||
| getString       | It converts the lines of the file that has been converted into an array into a string and returns it              |                               |
| getLine      | Returns a particular line from the file         |          getLine(2)           |                          |
|   firstLine    |get the first line of the file |                               |
|   lastLine |      get the last line of the file                  ||
|    between   |       Taking lines between two lines                  |         between(3,10)         |
|    append   |    Adds the new word to the end of the file                    | append('word1','word2',....)  |
|    appendTo   |      Adds the new word after the selected line of the file                   |    appendTo('new word',3)     |
|   prepend    |       Adds the new word to the beginning of the file                 | prepend('word1','word2',....) |
|   prependTo    |    Adds the new word to the beginning of the selected line of the file                    |    prependTo('new word',4)    |
|   clean    |          Remove null or empty line              |                               |
|    deleteLine   |      Delete a specific line                  |         deleteLine(2)         |
|   emptyFile    |            It empties the file            |                               |
|   fileSize    |      Returns the size of the file                  |                               |


### For example, we want to add some text to our file

```

$file = \Open\Open::ready();

$result = $file->open('file.txt')
->append('word','word1')
->appendTo('word2',1)
->prepend('word3','word4')
->prependTo('word5',2)
->clean()
->write();

or 

We want to add text to our file and then receive a array output

$result = $file->open('file.txt')
->append('word','word1')
->appendTo('word2',1)
->prepend('word3','word4')
->prependTo('word5',2)
->clean()
->write()->readLines();

print_r($result);

Sample output
[
    [0] => word3
    [1] => word4
    [2] => word5
    [3] => word
    [4] => word1
    [5] => word2
]

```

!!!! If you want to just get the output without writing to the file, omit the write() method. !!!!

For example
```
$result = $file->open('file.txt')
->append('word','word1')
->appendTo('word2',1)
->readLines();

print_r($result);

Sample output
[
    [0] => word
    [1] => word1
    [2] => word2
]
```