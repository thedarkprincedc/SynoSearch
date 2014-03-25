import os, time
import json
import ConfigParser;

def ConfigurationInitialize():
    global search_query
    Config = ConfigParser.ConfigParser()
    Config.read("configuration.ini")
    search_query=Config.get("SearchConfiguration", "Search").split(';')
    
def directory_search(file_path):
    return_data=dict()
    data=list() 
    info=list()
    count=0
    for filename in os.listdir(file_path):
        if(os.path.isfile(file_path + "/" +filename)):
            statinfo = os.stat(file_path + "/" + filename)
            s = "filename=%s;path=%s;filesize=%s;date=%s" %(filename,file_path,statinfo.st_size,time.ctime(statinfo.st_ctime))
            tempDict=dict(item.split("=") for item in s.split(";"))
            data.append(tempDict)
            return_data["data"]=data
            count=count+1
    tempInfo=dict()
    tempInfo["results"]=count
    info.append(tempInfo)       
    return_data["info"]=info
    return return_data

def directory_search_list(path):
    dir_text = ""
    for item in path:
        dir_text += json.dumps(directory_search(item), sort_keys=True, indent=4, separators=(',', ' : ')) + "\n\n"
    return dir_text

ConfigurationInitialize()
print directory_search_list(search_query)