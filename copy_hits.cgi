#!/usr/bin/python

f = open('counter.txt')
number = int(f.readline())
f.close()
print "%d" % number
