import ftplib
import time

def auto_login(host, username, password):
    try:
        with ftplib.FTP(host) as ftp:
            ftp.login(username, password)
            print("Logged in successfully")
            auto_logout(ftp)
    except ftplib.all_errors as e:
        print(f"Error: {e}")

def auto_logout(ftp):
    try:
        ftp.quit()
        print("Logged out successfully")
    except ftplib.all_errors as e:
        print(f"Error: {e}")

def main():
    host = "10.62.0.182"
    username = "itsupport01"
    password = "P@55vv0rd"

    while True:
        auto_login(host, username, password)
        time.sleep(30)

if __name__ == "__main__":
    main()
