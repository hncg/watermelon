namespace php bps

struct Blog {
  1: i32 id,
  2: string content,
  3: string time,
  4: string author,
  5: string title,
}


exception SystemException {
	1: i32 code,
	2: string message
}

service Bps {
    i16 ping() throws (1:SystemException SysException),

    Blog mget_blog() throws (1:SystemException SysException)
}