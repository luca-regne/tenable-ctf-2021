def AreNumbersEven(numbers):
  #impliment here
    even_odd_boolean_list = []
    for n in numbers:
        if n % 2 == 0:
            even_odd_boolean_list.append(True)
        else:
            even_odd_boolean_list.append(False)
    return even_odd_boolean_list


# Read space delimited integers from stdin and 
# pass a list of them to AreNumbersEven()
numbers = raw_input()
integer_list = [int(i) for i in numbers.split(' ')]
even_odd_boolean_list = AreNumbersEven(integer_list)
print even_odd_boolean_list