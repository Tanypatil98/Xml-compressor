import sys
file = sys.argv[1]
fh = open(file,'r')
str = fh.read()
dict = eval(str)
print(dict)

outerlst = []
innerlst = []

fh = open('Decompresed Output.xml','w')
def recursive(dict):
    for key,val in dict.items():
        if type(val) == type({}):
            fh.write('<'+key+'> ')
            dict = val
            outerlst.append(key)
            recursive(dict)
        else:
            for d in val:
                innerlst = []
                for i,j in d.items():
                    if( i[0] == '@'):
                        fh.write('<'+key+' '+i[1]+'="'+j+'"> ')
                        innerlst.append(key)
                    else:
                        fh.write('<'+i+'>'+j+'</'+i+'> ')
                for ele in innerlst:
                    fh.write('</'+ele+'> ')
recursive(dict)
for i in range(len(outerlst)-1, -1, -1) :
    fh.write('</'+outerlst[i]+'> ')
fh.close()
