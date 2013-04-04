#!/usr/bin/python

f = open('counter.txt')
number = int(f.readline())
f.close()
open('counter.txt', 'w').close()
f = open('counter.txt', 'w')
f.write('%d'%(number+1))
f.close()
