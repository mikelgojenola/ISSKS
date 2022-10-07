from collections import Counter

text = "RIJ AZKKZHC PIKCE XT ACKCUXJHX SZX E NZ PEJXKE PXGIK XFDKXNEQE RIPI RIPQEHCK ET OENRCNPI AXNAX ZJ RKCHXKCI AX CJAXDXJAXJRCE AX RTENX E ACOXKXJRCE AXT RITEQIKERCIJCNPI OKXJHXDIDZTCNHE AX TE ACKXRRCIJ EJEKSZCNHE AZKKZHC OZX ZJ OERHIK AX DKCPXK IKAXJ XJ XT DEDXT AX TE RTENX IQKXKE XJ REHETZJVE XJ GZTCI AX 1936 DXKI AZKKZHC RIPI IRZKKX RIJ TEN DXKNIJETCAEAXN XJ TE MCNHIKCE JI REVI AXT RCXTI DXKNIJCOCREQE TE HKEACRCIJ KXvITZRCIJEKCE AX TE RTENX IQKXKE NZ XJIKPX DIDZTEKCAEA XJHKX TE RTENX HKEQEGEAIKE KXOTXGEAE XJ XT XJHCXKKI PZTHCHZACJEKCI XJ QEKRXTIJE XT 22 AX JIvCXPQKX AX 1936 PZXNHKE XNE CAXJHCOCRERCIJ NZ PZXKHX OZX NCJ AZAE ZJ UITDX IQGXHCvI ET DKIRXNI KXvITZRCIJEKCI XJ PEKRME NCJ AZKKZHC SZXAI PEN TCQKX XT REPCJI DEKE SZX XT XNHETCJCNPI RIJ TE RIPDTCRCAEA AXT UIQCXKJI AXT OKXJHX DIDZTEK V AX TE ACKXRRCIJ EJEKSZCNHE HXKPCJEKE XJ PEVI AX 1937 TE HEKXE AX TCSZCAEK TE KXvITZRCIJ AXNPIKETCLEJAI E TE RTENX IQKXKE V OERCTCHEJAI RIJ XTTI XT DINHXKCIK HKCZJOI OKEJSZCNHE"
letters = Counter(text)
print("cantidad de letras = ", len(letters))
print(letters)

text = text.replace(' ', ' ')
text = text.replace('X', 'e')
text = text.replace('E', 'a')
text = text.replace('K', 'r')
text = text.replace('I', 'o')
text = text.replace('C', 'i')
text = text.replace('J', 'n')
text = text.replace('T', 'l')
text = text.replace('A', 'd')
text = text.replace('R', 'c')
text = text.replace('Z', 'u')
text = text.replace('N', 's') #
text = text.replace('H', 't') #
text = text.replace('P', 'm')
text = text.replace('D', 'p')
text = text.replace('Q', 'b') #
text = text.replace('O', 'f') #
text = text.replace('S', 'q')
text = text.replace('G', 'j') #
text = text.replace('V', 'y') #
text = text.replace('v', 'v') #
text = text.replace('U', 'g')
text = text.replace('M', 'h')
text = text.replace('F', 'x')
text = text.replace('L', 'z') #

print(text)
